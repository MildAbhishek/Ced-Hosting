<?php
// session_start();
class User{
    public $email;
    public $name;
    public $mobile;
    public $password;
    public $question;
    public $answer;
    public $result='';
    
    public function signup($email, $name, $mobile, $password, $question, $answer, $conn) {
        $password= md5($password);
        $sql= "SELECT * FROM tbl_user WHERE `email`='$email' ";
        $result= $conn->query($sql);
        if($result->num_rows > 0){
            echo ("<script>alert('Email Already Exist')</script>");
        }else{
            $sql="INSERT INTO tbl_user (`email`, `name`, `mobile`, `password`, `security_question`, `security_answer`) VALUES('$email', '$name', '$mobile', '$password', '$question', '$answer')";
         
            $result=$conn->query($sql);

            if ($result) {
            
                // header('Location: login.php');
                echo ("<script>alert('Successfully Registered')</script>");
                header('Location: mobileverification.php');
            } else {
                echo ("<script>alert('Registration Failed')</script>");
            }
        }
    }

    public function login($email, $password, $conn) {
        $password= md5($password);
        
        $sql="SELECT * FROM tbl_user  WHERE `email`='$email' AND `password`='$password' ";
         
        $result=$conn->query($sql);

        if ($result->num_rows > 0) {
            while($row= $result->fetch_assoc()){
                if($row['active']==0){
                    echo ("<script>alert('Your Mobile or Email is not verified Yet.')</script>"); 
                } else {
                    // header('Location: login.php');
                    if($row['is_admin']==0){
                        echo ("<script>alert('Successfully Logged In')</script>");
                        $_SESSION['userdata']=array('id'=>$row['id'], 'email'=>$row['email'], 'name'=> $row['name'], 'mobile'=>$row['mobile'], 'emailapproved'=>$row['email_approved'], 'phoneapproved'=>$row['phone_approved'], 'active'=>$row['active'], 'isadmin'=>$row['is_admin'], 'signupdate'=>$row['sign_up_date'], 'password'=>$row['password'], 'securityquestion'=>$row['security_question'], 'securityanswer'=>$row['security_answer']);
                        header('Location: index.php');
                    }
                    if($row['is_admin']==1){
                        echo ("<script>alert('Successfully Logged In')</script>");
                        $_SESSION['userdata']=array('id'=>$row['id'], 'email'=>$row['email'], 'name'=> $row['name'], 'mobile'=>$row['mobile'], 'emailapproved'=>$row['email_approved'], 'phoneapproved'=>$row['phone_approved'], 'active'=>$row['active'], 'isadmin'=>$row['is_admin'], 'signupdate'=>$row['sign_up_date'], 'password'=>$row['password'], 'securityquestion'=>$row['security_question'], 'securityanswer'=>$row['security_answer']);
                        header('Location: admin/index.php');
                    }
                }
            }
        }else {
            echo ("<script>alert('Login Failed')</script>");
        }
        
    }
}
?>