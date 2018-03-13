$(document).ready(function () {
  document.getElementById("current-button").onclick = function() {
    document.getElementById("upcoming").style.display = "none"
    document.getElementById("current").style.display = "none";
    document.getElementById("Passed").style.display = "block";
  }

  document.getElementById("upcoming-button").onclick = function() {
    document.getElementById("upcoming").style.display = "block";
    document.getElementById("current").style.display = "none";
    document.getElementById("Passed").style.display = "none";
  }

  document.getElementById("Passed-button").onclick = function() {
    document.getElementById("upcoming").style.display = "none";
    document.getElementById("current").style.display = "block";
    document.getElementById("Passed").style.display = "none";
  }

  setTimeout(function(){ document.getElementById("welcome-message").classList.add("hidden") }, 3000);
});
