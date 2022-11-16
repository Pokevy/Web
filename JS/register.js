function checkForm(from) {
    if(from.username.value===""||from.password_1.value===""||from.password_2.value==="") {
        alert("用户名或密码为空");
        return false;
    }
    else if (from.password_1.value!==from.password_2.value) {
        alert("两次输入的密码不一致!");
        return false;
    }else
        return true;
}