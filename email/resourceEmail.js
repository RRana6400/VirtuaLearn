function sendEmailResource(){
  alert("The message is sent successfully !");
  var templateParams = {
  to_email:document.querySelector("#inputEmail42").value,
  name: '',
  sub_name: document.querySelector("#inputSubjectName").value,
  // from_email: document.querySelector("#").value, //default from database
  typeOfResource: document.querySelector("#inputTypeOfResource").value,
  link: document.querySelector("#inputLink").value,
  message: document.querySelector("#inputNote1").value,
  title: 'New Module !',
};
console.log("HARI BOL");
emailjs.send('service_yjihxrw', 'template_zy6weko', templateParams).then(
  (response) => {
    console.log('SUCCESS!', response.status, response.text);
  },
  (error) => {
    console.log('FAILED...', error);
  },
);
}
