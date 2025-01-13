<<<<<<< HEAD
//! FILTRO DOS CARDS
$(function () {
  document.getElementById("titleFilter").addEventListener("input", filtroCards);
  // $("#titleFilter").keypress(filtroCards()); //Não funcionou
  document.querySelectorAll('input[name="typeFilter"]').forEach((radio) => {
    radio.addEventListener("change", filtroCards);
  });
  // $("input[name='typeFilter']:checked").on("change", filtroCards()); //Não funcionou

  $("#pesquisar").click(filtroCards());
  function filtroCards() {
    const titleFilter = document.getElementById("titleFilter").value.toLowerCase();
    const typeFilter = document.querySelector('input[name="typeFilter"]:checked').value.toLowerCase();
    const cards = document.querySelectorAll(".card-item");

    cards.forEach((item) => {
      const title = item.getAttribute("data-title").toLowerCase();
      const type = item.getAttribute("data-type").toLowerCase();

      if ((title.includes(titleFilter) || titleFilter === "") && (type === typeFilter || typeFilter === "")) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  }
});

//! Inscrições abertas e fechadas
$(function () {
  //com base na data
});
=======
//! FILTRO DOS CARDS
$(function () {
  document.getElementById("titleFilter").addEventListener("input", filtroCards);
  // $("#titleFilter").keypress(filtroCards()); //Não funcionou
  document.querySelectorAll('input[name="typeFilter"]').forEach((radio) => {
    radio.addEventListener("change", filtroCards);
  });
  // $("input[name='typeFilter']:checked").on("change", filtroCards()); //Não funcionou

  $("#pesquisar").click(filtroCards());
  function filtroCards() {
    const titleFilter = document.getElementById("titleFilter").value.toLowerCase();
    const typeFilter = document.querySelector('input[name="typeFilter"]:checked').value.toLowerCase();
    const cards = document.querySelectorAll(".card-item");

    cards.forEach((item) => {
      const title = item.getAttribute("data-title").toLowerCase();
      const type = item.getAttribute("data-type").toLowerCase();

      if ((title.includes(titleFilter) || titleFilter === "") && (type === typeFilter || typeFilter === "")) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  }
});

//! Inscrições abertas e fechadas
$(function () {
  //com base na data
});
>>>>>>> master
