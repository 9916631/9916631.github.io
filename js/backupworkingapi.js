var request = new XMLHttpRequest();
request.open('GET', 'https://9916631.2020.labnet.nz/crudscp2/json/foundationscp.json', true);
request.onload = function () {
   
const rootDiv = document.getElementById('root');


  // Begin accessing JSON data here
  var data = JSON.parse(this.response);
if (request.status >= 200 && request.status < 400) 
 {
    data.forEach(subject => {

      
      const cardMainDiv = document.createElement('div');
      cardMainDiv.setAttribute('class', 'card-header bg-white text-center m-4');

      const h1 = document.createElement('h1');
      h1.setAttribute('class', 'card-header bg-dark text-center text-warning');
      h1.textContent = subject.name;

      const cardBody = document.createElement('div');
      cardBody.setAttribute('class', 'card-body');
      
      const p1 = document.createElement('p');
      p1.setAttribute('class', 'card-text');
      p1.textContent = subject.description;     

      const p2 = document.createElement('p');
      p2.setAttribute('class', 'card-text');
      p2.textContent = subject.price;

      const p3 = document.createElement('p');
      p3.setAttribute('class', 'card-text');
      p3.textContent = subject.reference;
      

      const cardFooter = document.createElement('div');
      cardFooter.setAttribute('class', 'card-footer bg-dark border-warning text-center');

      rootDiv.appendChild(cardMainDiv);
      cardMainDiv.appendChild(h1);
      cardMainDiv.appendChild(cardBody);
      cardBody.appendChild(p1);
      cardBody.appendChild(p2);
      cardBody.appendChild(p3);     
      cardBody.appendChild(cardFooter);

    });
  } else { 

    const errorMessage = document.createElement('div');
    errorMessage.setAttribute('class', 'alert alert-danger');
    errorMessage.textContent = 'Data not loading';
    rootDiv.appendChild(errorMessage);
  }
}

request.send();