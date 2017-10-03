// Hide all tab content
var tabContent = document.querySelectorAll('.tab-content');
var tabHeadings = document.querySelectorAll('.tabs__nav li');
var accordionHeadings = document.querySelectorAll('.tab-heading');

/* if in tab mode */
for (var t = 0, tLen = tabHeadings.length; t < tLen; t++) {
  tabHeadings[t].addEventListener('click', function(e) {
    for (var c = 0, len = tabContent.length; c < len; c++) {
      tabContent[c].classList.remove('active')
    }

    for (var h = 0, len = tabHeadings.length; h < len; h++) {
      tabHeadings[h].classList.remove('active')
    }

    var activeTab = e.currentTarget.getAttribute('data-index');

    document.getElementById(activeTab).classList.add('active');
    e.currentTarget.classList.add('active');
  });
}

for (var a = 0, aLen = accordionHeadings.length; a < aLen; a++) {
  accordionHeadings[a].addEventListener('click', function(e) {
    for (var co = 0, len = tabContent.length; co < len; co++) {
      tabContent[co].classList.remove('active')
    }

    for (var ah = 0, len = accordionHeadings.length; ah < len; ah++) {
      accordionHeadings[ah].classList.remove('active')
    }

    var activeAccordion = e.currentTarget.getAttribute('data-index');
    console.log(activeAccordion);

    document.getElementById(activeAccordion).classList.add('active');
    e.currentTarget.classList.add('active');
  });
}