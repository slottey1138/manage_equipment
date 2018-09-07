function checkRegister() {
    var mb_id = document.forms["registerForm"]["txt_mb_id"].value;
    var mb_fname = document.forms["registerForm"]["txt_mb_fname"].value;
    var mb_lname = document.forms["registerForm"]["txt_mb_lname"].value;
    var mb_pass = document.forms["registerForm"]["txt_mb_pass"].value;
    var mb_cpass = document.forms["registerForm"]["txt_mb_cpass"].value;
    
    if(mb_id == ""){
        alert("กรุณาใส่รหัสประจำตัว !!");
        return false;
    }
    else if(mb_id.length != 4){
        alert("ข้อมูลรหัสประจำตัวไม่ถูกต้อง !!") 
        return false;
    }
    else if(mb_fname == ""){
        alert("กรุณาใส่ชื่อ !!");
        return false;
    }
    else if(mb_fname.length < 2){
        alert("ชื่อผู้ใช้สั้นเกินไป !!");
        return false;
    }
    else if(mb_lname == ""){
        alert("กรุณาใส่นามสกุล !!");
        return false;
    }
    else if(mb_lname.length < 2){
        alert("นามสกุลผู้ใช้สั้นเกินไป !!");
        return false;
    }
    else if(mb_pass == ""){
        alert("กรุณาใส่รหัสผ่าน !!");
        return false;
    }
    else if(mb_pass.length < 6){
        alert("รหัสผ่านสั้นเกินไป !!");
        return false;
    }
    else if(mb_cpass == ""){
        alert("ใส่ข้อมูลยืนยันรหัสผ่าน !!");
        return false;
    }
    else if(mb_pass != mb_cpass ){
        alert("รหัสผ่านไม่ตรงกัน !!");
        return false;
    }
    else{
        return true;
    }
}