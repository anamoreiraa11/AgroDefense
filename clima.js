
function buscarClima() {
    var cidade = document.getElementById('pesquisa').value
  
    const apiUrl = 'https://api.openweathermap.org/data/2.5/weather?q=' + cidade + '&appid=6cbc1b467d0d35a2c8c79bf1b05d3cfa&#39';
  
    // Fazer uma solicitação GET à API usando fetch()
    fetch(apiUrl)
      .then(response => {
        if (!response.ok) {
          throw new Error('verifique o nome da cidade e tente novamente');
        }
        const retorno = response.json(); // Converte a resposta em JSON  
        return retorno;
  
      })
  
      .then(data => {
        // Aqui você pode manipular os dados recebidos da API
        console.log(data.main.temp);
        //passando o valor do objeto onde o main contem os valores da temperatura
        var temp = data.main.temp;
        temp = temp - 273; //convertendo para celcius
        temp = temp.toFixed(1); // deixando com 2 casas decimais
        console.log(data.weather[0].main);
        var clima = data.weather[0].main;
        document.getElementById("exibir").textContent = temp + "°C   " + clima;
  
  
        var max = data.main.temp_max;
        max = max - 273;
        max = max.toFixed(0);
        document.getElementById("exibirMax").textContent = max + "°C";
  
        var min = data.main.temp_min;
        min = min - 273;
        min = min.toFixed(0);
        document.getElementById("exibirMin").textContent = min + "°C";
  
        var Sensação = data.main.feels_like;
        Sensação = Sensação - 273;
        Sensação = Sensação.toFixed(0);
        document.getElementById("exibirSen").textContent = Sensação + "°C";
  
        var umidade = data.main.humidity;
        umidade = umidade.toFixed(0);
        document.getElementById("exibirUmi").textContent = umidade;
  
        const imagemElement = document.getElementById("imagem");
  
        if (clima == "Clouds") {
          imagemElement.src = "img/nuvem.png";
  
        } else if (clima == "Rain") {
          imagemElement.src = "img/chuva.png";
  
        } else if (clima == "Clear") {
          imagemElement.src = "img/limpo.png";
  
        } else if (clima == "sunny") {
          imagemElement.src = "img/sol.png";
  
        } else if (clima == "Thunderstorm") {
          imagemElement.src = "img/tempestade.png";
  
        } else if (clima == "Squall") {
          imagemElement.src = "img/tempestade.png";
  
        } else if (clima == "Mist") {
          imagemElement.src = "img/neve.png";
        }
      })
  
  
      .catch(error => {
        alert(error);
      });
  }
  