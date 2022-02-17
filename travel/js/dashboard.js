const navbar_toggle = document.querySelector('.menu_toggle');
const navbar_content = document.querySelector('.navbar_content ');


navbar_toggle.addEventListener('click',()=> {
    navbar_content.classList.toggle('navbar_content-show');
})

const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Profit',
      backgroundColor: '#0075ff',
      borderColor: '#0075ff',
      data: [0, 100, 500, 200, 200, 300, 405],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
        plugins: {
            legend: {
                display: false,
            },
            title: {
                display: true,
                text: 'Profit in the Last Month',
              }
          }
    }
  };

  const myChart = new Chart(
    document.querySelector('.chart'),
    config
  );