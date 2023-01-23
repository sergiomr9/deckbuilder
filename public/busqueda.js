document.querySelector(".search input[name='search']").addEventListener("input", liveSearch);
function liveSearch() {
    // Get the search query
    var searchQuery = document.querySelector(".search input[name='search']").value.toLowerCase();
    // Get all the cards
    var cards = document.querySelectorAll(".card img");
    
    // Loop through all the cards
    for (var i = 0; i < cards.length; i++) {
      // Get the name of the current card
      var name = cards[i].getAttribute("data-name").toLowerCase();
      // Check if the name contains the search query
      if (name.indexOf(searchQuery) === -1) {
        // If it doesn't, hide the card
        cards[i].style.display = "none";
      } else {
        // If it does, show the card
        cards[i].style.display = "block";
      }
    }
  }