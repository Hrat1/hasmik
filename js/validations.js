function validatePassword(password) {
    let regularExpression = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z\d@$!%#*?&]{8,}$/;
    return regularExpression.test(password);
}
