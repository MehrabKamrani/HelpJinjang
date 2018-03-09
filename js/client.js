      document.getElementById("completed-button").onclick = function() {
            document.getElementById("available").style.display = "none"
            document.getElementById("cancelled").style.display = "none";
            document.getElementById("completed").style.display = "block";
                      }


      document.getElementById("available-button").onclick = function() {
          document.getElementById("available").style.display = "block";
          document.getElementById("cancelled").style.display = "none";
          document.getElementById("completed").style.display = "none";
                          }

      document.getElementById("cancelled-button").onclick = function() {
          document.getElementById("available").style.display = "none";
          document.getElementById("cancelled").style.display = "block";
          document.getElementById("completed").style.display = "none";
                              }

  setTimeout(function(){ document.getElementById("welcome-message").classList.add("hidden") }, 3000);
