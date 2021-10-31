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
      cardMainDiv.setAttribute('class', 'card-header text-center m-2');

      const h1 = document.createElement('h1');
      h1.setAttribute('class', 'card-header bg-dark text-center text-warning');
      h1.textContent = subject.name;

      const cardBody = document.createElement('div');
      cardBody.setAttribute('class', 'card-body bg-white');
      
      const p4 = document.createElement('h4');
      p4.setAttribute('class', 'card-text text-left');
      p4.textContent = subject.containhead; 

      const p1 = document.createElement('p');
      p1.setAttribute('class', 'card-text text-left');
      p1.textContent = subject.containment;    
      
      const p5 = document.createElement('h4');
      p5.setAttribute('class', 'card-text text-left');
      p5.textContent = subject.descriphead;

      const p2 = document.createElement('p');
      p2.setAttribute('class', 'card-text text-left');
      p2.textContent = subject.description;

      const p3 = document.createElement('h4');
      p3.setAttribute('class', 'card-text text-left');
      p3.textContent = subject.reference;
      
      const p6 = document.createElement('p');
      p6.setAttribute('class', 'card-text text-left');
      p6.textContent = subject.referencepara;

      const cardFooter = document.createElement('div');
      cardFooter.setAttribute('class', 'card-footer bg-dark text-center');

      rootDiv.appendChild(cardMainDiv);
      cardMainDiv.appendChild(h1);
      cardMainDiv.appendChild(cardBody);
      cardBody.appendChild(p4);
      cardBody.appendChild(p1);
      cardBody.appendChild(p5);
      cardBody.appendChild(p2);
      cardBody.appendChild(p3);
      cardBody.appendChild(p6);     
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