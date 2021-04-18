function sendEmail(to, subject, body){
    Email.send({
        SecureToken : "0db848e5-1280-4495-b751-0c0bb0be82c7",
        To : `${to}`,
        From : "hratjan99@gmail.com",
        Subject : `${subject}`,
        Body : `${body}`
    }).then(
    );
}
