<?php 

    require_once('main.class.php');
    

    class ResidentClass extends EUSEBIAClass {
        //------------------------------------ RESIDENT CRUD FUNCTIONS ----------------------------------------

        public function create_resident() {
            if(isset($_POST['add_resident'])) {
                $email = $_POST['email'];
                $password = ($_POST['password']);
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $mi = $_POST['mi'];
                $age = $_POST['age'];
                $sex = $_POST['sex'];
                $status = $_POST['status'];
                $houseno = $_POST['houseno'];
                $street = $_POST['street'];
                $brgy = $_POST['brgy'];
                $municipal = $_POST['municipal'];
                $contact = $_POST['contact'];
                $bdate = $_POST['bdate'];
                $bplace = $_POST['bplace'];
                $nationality = $_POST['nationality'];

                $min_age = 18;
                $max_age = 150;

                if ($this->check_resident($email) == 0 ) {

                    if(!in_array( $age, range( $min_age, $max_age) ) ){
                        $message1 = "Sorry, you are still underaged to register an account";
                        echo "<script type='text/javascript'>alert('$message1');</script>";
                        return(0);
                    }
    
                    else {

                        $connection = $this->openConn();
                        $stmt = $connection->prepare("INSERT INTO tbl_resident ( `email`,`password`,`lname`,`fname`,
                        `mi`, `age`, `sex`, `status`, `houseno`, `street`, `brgy`, `municipal`, `contact`, `bdate`, 
                        `bplace`, `nationality`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,? )");
    
                        $stmt->Execute([ $email, $password, $lname, $fname, $mi, $age, $sex, $status, 
                        $houseno, $street, $brgy, $municipal, $contact, $bdate, $bplace, $nationality]);

                        $message2 = "Account added, you can now continue logging in";
                        echo "<script type='text/javascript'>alert('$message2');</script>";

                        header("Refresh:0");
                    }
                }

                else {
                    echo "<script type='text/javascript'>alert('Email Account already exists');</script>";
                }
            }
        }

        public function view_resident(){
            $connection = $this->openConn();
            $stmt = $connection->prepare("SELECT * from tbl_resident");
            $stmt->execute();
            $view = $stmt->fetchAll();
            return $view;
        }

        public function update_resident() {
            if (isset($_POST['update_resident'])) {
                $id_resident = $_GET['id_resident'];
                $email = $_POST['email'];
                $password = ($_POST['password']);
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $mi = $_POST['mi'];
                $age = $_POST['age'];
                $sex = $_POST['sex'];
                $status = $_POST['status'];
                $houseno = $_POST['houseno'];
                $street = $_POST['street'];
                $brgy = $_POST['brgy'];
                $municipal = $_POST['municipal'];
                $contact = $_POST['contact'];
                $bdate = $_POST['bdate'];
                $bplace = $_POST['bplace'];
                $nationality = $_POST['nationality'];

                $connection = $this->openConn();

// 1. Check if the password is being changed
if (!empty($password)) {
    // If password is NOT empty, update EVERYTHING including the new password
    $stmt = $connection->prepare("UPDATE tbl_resident SET `password` =?, `lname` =?, 
        `fname` = ?, `mi` =?, `age` =?, `sex` =?, `status` =?, `email` =?, `houseno` =?, `street` =?,
        `brgy` =?, `municipal` =?, `contact` =?,
        `bdate` =?, `bplace` =?, `nationality` =? WHERE `id_resident` = ?");
    
    $stmt->execute([$password, $lname, $fname, $mi, $age, $sex, $status, $email, $houseno, 
        $street, $brgy, $municipal, $contact, $bdate, $bplace, $nationality, $id_resident]);

} else {
    // 2. If password is empty, update everything EXCEPT the password column
    $stmt = $connection->prepare("UPDATE tbl_resident SET `lname` =?, 
        `fname` = ?, `mi` =?, `age` =?, `sex` =?, `status` =?, `email` =?, `houseno` =?, `street` =?,
        `brgy` =?, `municipal` =?, `contact` =?,
        `bdate` =?, `bplace` =?, `nationality` =? WHERE `id_resident` = ?");
    
    // Note: $password is removed from the array below
    $stmt->execute([$lname, $fname, $mi, $age, $sex, $status, $email, $houseno, 
        $street, $brgy, $municipal, $contact, $bdate, $bplace, $nationality, $id_resident]);
}

$message2 = "Resident Data Updated";
echo "<script type='text/javascript'>alert('$message2');</script>";
header("refresh: 0");
            }
        }

        public function delete_resident(){
            $id_resident = $_POST['id_resident'];

            if(isset($_POST['delete_resident'])) {
                $connection = $this->openConn();
                $stmt = $connection->prepare("DELETE FROM tbl_resident where id_resident = ?");
                $stmt->execute([$id_resident]);

                $message2 = "Resident Data Deleted";
                
                echo "<script type='text/javascript'>alert('$message2');</script>";
                header("Refresh:0");
            }
        }

    //-------------------------------- EXTRA FUNCTIONS FOR RESIDENT CLASS ---------------------------------

    


    public function get_single_resident($id_resident){

        $id_resident = $_GET['id_resident'];
        
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident where id_resident = ?");
        $stmt->execute([$id_resident]);
        $resident = $stmt->fetch();
        $total = $stmt->rowCount();

        if($total > 0 )  {
            return $resident;
        }
        else{
            return false;
        }
    }
   
    public function check_resident($email) {

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE email = ?");
        $stmt->Execute([$email]);
        $total = $stmt->rowCount(); 

        return $total;
    }

    public function count_resident() {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();
        return $rescount;
    }

    public function check_household($lname, $mi) {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE lname = ? AND mi = ?");
        $stmt->Execute([$lname, $mi]);
        $total = $stmt->rowCount(); 
        return $total;
    }

    public function view_household_list() {
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];

        if(isset($_POST['search_household'])) {
            $connection = $this->openConn();
            $stmt1 = $connection->prepare("SELECT * FROM `tbl_resident` WHERE `lname` LIKE '%$lname%' and  `mi` LIKE '%$mi%'");
            $stmt1->execute();
        }
    }

    public function count_male_resident() {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where sex = 'male' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_female_resident() {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where sex = 'female'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_head_resident() {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where family_role = 'Yes'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function count_member_resident() {
        $connection = $this->openConn();

        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where family_role = 'Family Member'");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }

    public function profile_update() {
        $id_resident = $_GET['id_resident'];
        $age = $_POST['age'];
        $status = $_POST['status'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];

        if (isset($_POST['profile_update'])) {
           
            $connection = $this->openConn();
            $stmt = $connection->prepare("UPDATE tbl_resident SET  `age` = ?,  `status` = ?, 
            `address` = ?, `contact` = ? WHERE id_resident = ?");
            $stmt->execute([ $age, $status, $address,
            $contact, $id_resident]);
               
            $message2 = "Resident Profile Updated";
                
            echo "<script type='text/javascript'>alert('$message2');</script>";
            header("Refresh:0");

        }

    }
    

    //------------------------------------- RESIDENT FILTERING QUERIES --------------------------------------

    public function view_resident_minor(){
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE `age` <= 17");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_adult(){
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE `age` >= 18 AND `age` <= 59");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_senior(){
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * FROM tbl_resident WHERE `age` >= 60");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function count_resident_senior() {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) FROM tbl_resident WHERE `age` >= 60");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }





    //-------------------------------------- EXTRA FUNCTIONS ------------------------------------------------

    public function resident_changepass() {
    if(isset($_POST['resident_changepass'])) {
        $id_resident = $_GET['id_resident'];
        $old_input = $_POST['oldpassword'];       // What they typed as "Old"
        $new_input = $_POST['newpassword'];       // What they typed as "New"
        $check_input = $_POST['checkpassword'];   // The "Confirm New" box

        $connection = $this->openConn();
        
        // 1. Get the CURRENT password from the database
        $stmt = $connection->prepare("SELECT `password` FROM tbl_resident WHERE id_resident = ?");
        $stmt->execute([$id_resident]);
        $user = $stmt->fetch();

        // 2. CHECK: Does the resident even exist?
        if (!$user) {
            echo "<script>alert('User not found');</script>";
            return;
        }

        // 3. CHECK: Does the typed OLD password match the DATABASE password?
        if ($old_input != $user['password']) {
            echo "<script>alert('Current password provided is incorrect');</script>";
        } 
        
        // 4. CHECK: Do the two NEW passwords match each other?
        elseif ($new_input != $check_input) {
            echo "<script>alert('New passwords do not match');</script>";
        } 
        
        // 5. SUCCESS: Update the password
        else {
            $update_stmt = $connection->prepare("UPDATE tbl_resident SET password = ? WHERE id_resident = ?");
            $update_stmt->execute([$new_input, $id_resident]);
            
            echo "<script type='text/javascript'>alert('Password Updated Successfully');</script>";
            header("refresh: 0");
            exit();
        }
    }
}



    //========================================== SCOPE CHANGED FUNCTIONS ===========================================

    public function view_resident_household(){
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE `family_role` = 'Yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_voters(){
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE `voter` = 'Yes'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_male(){
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE `sex` = 'Male'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function view_resident_female(){
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE `sex` = 'Female'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;
    }

    public function count_voters() {
        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT COUNT(*) from tbl_resident where `voter` = 'Yes' ");
        $stmt->execute();
        $rescount = $stmt->fetchColumn();

        return $rescount;
    }


    
    

    public function search_admn_voter() {
        
        $search = $_GET['search'];

        $connection = $this->openConn();
        $stmt = $connection->prepare("SELECT * from tbl_resident WHERE `fname` = '$search'");
        $stmt->execute();
        $view = $stmt->fetchAll();
        return $view;

            


            
        
        

    }
public function count_by_grade($table_name, $column = null, $value = null) {
    $connection = $this->openConn();
    
    if ($column === null) {
        // Simple count for Grade 7, 8, 9, 10
        $stmt = $connection->prepare("SELECT COUNT(*) FROM $table_name");
        $stmt->execute();
    } else {
        // Specific count for Strands (STEM, ABM, etc.)
        $stmt = $connection->prepare("SELECT COUNT(*) FROM $table_name WHERE $column = ?");
        $stmt->execute([$value]);
    }
    
    return $stmt->fetchColumn();
}





    }

    $residenteusebia = new ResidentClass();
?>