
function loginFunc()
{
  const serialize_form = form => JSON.stringify(
    Array.from(new FormData(form).entries())
         .reduce((m, [ key, value ]) => Object.assign(m, { [key]: value }), {})
  );
  
  $('#loginBtn').on('click', function(event) {
    event.preventDefault();
    const json = serialize_form(this);
    console.log(json);
  
    $.ajax({
      type: 'POST',
      url: "http://localhost/AttendanceSystem/index.php/LoginController/login",
      dataType: 'json',
      data: json,
      contentType: 'application/json',
      success: function(data) {
       
        // alert(data);
  
        window.location.href = "http://localhost/AttendanceSystem/"+data.url;
      }
    });
  });
}
