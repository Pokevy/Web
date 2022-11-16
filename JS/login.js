function checkForm(from) {
    if (from.username.value === "" || from.password.value === "") {
        alert("用户或密码为空");
        return false;
    }else
        return true;
}