$(function(){
  // Hide all tab content
  var tabContent = document.querySelectorAll('.tab-content');
  var tabHeadings = document.querySelectorAll('.tabs__nav li');
  var accordionHeadings = document.querySelectorAll('.tab-heading');

  function handleClick(e) {
    for (var c = 0, len = tabContent.length; c < len; c++) {
      tabContent[c].classList.remove('active');
    }

    for (var h = 0, hlen = tabHeadings.length; h < hlen; h++) {
      tabHeadings[h].classList.remove('active');
    }

    var activeTab = e.currentTarget.getAttribute('data-index');

    document.getElementById(activeTab).classList.add('active');
    e.currentTarget.classList.add('active');
  }

  function handleAccordion(e) {
    for (var co = 0, colen = tabContent.length; co < colen; co++) {
      tabContent[co].classList.remove('active');
    }

    for (var ah = 0, ahlen = accordionHeadings.length; ah < ahlen; ah++) {
      accordionHeadings[ah].classList.remove('active');
    }

    var activeAccordion = e.currentTarget.getAttribute('data-index');

    document.getElementById(activeAccordion).classList.add('active');
    e.currentTarget.classList.add('active');
  }

  /* if in tab mode */
  for (var t = 0, tLen = tabHeadings.length; t < tLen; t++) {
    tabHeadings[t].addEventListener('click', handleClick.bind(this));
  }

  for (var a = 0, aLen = accordionHeadings.length; a < aLen; a++) {
    accordionHeadings[a].addEventListener('click', handleAccordion.bind(this));
  }
});