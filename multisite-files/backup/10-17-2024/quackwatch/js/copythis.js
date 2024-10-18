function copyText() {
  /* Get the text field */
  var t = document.getElementById("email-contents");

  /* Select the text field */
  t.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Text Copied!");
}

document.getElementById('copyCode').addEventListener('click', copyText, false);
