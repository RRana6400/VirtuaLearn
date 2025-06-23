function sendEmailSchedule(){
  alert("The message is sent successfully !");
  var templateParams = {
  to_email:document.querySelector("#inputEmail4").value,
  sub_name: document.querySelector("#inputSubject").value,
  // from_email: document.querySelector("#").value, //default from database
  time: document.querySelector("#inputTime").value,
  message: document.querySelector("#inputNote").value,
  name: '',
  title: 'New Class!',
  classCode: document.querySelector("#inputCode").value,
  classLink: document.querySelector("#inputlink2").value,
};
console.log("HARI BOL");
emailjs.send('service_yjihxrw', 'template_1vti22w', templateParams).then(
  (response) => {
    console.log('SUCCESS!', response.status, response.text);
  },
  (error) => {
    console.log('FAILED...', error);
  },
);
}

