$(document).ready(function() {
  $.ajax({
    url: "./averages.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var avgAge = parseFloat(data[0].avg_age);
      $("#avgAge").html("Ikä: " + Math.round(avgAge));
      var ageData = {
        datasets: [{
          label: 'Keski-Ikä',
          backgroundColor: 'rgba(63,191,191,0.75)',
          borderColor: 'rgba(0,0,0,1.0)',
          borderWidth: 1.0,
          data: [avgAge],
        }]
      };
      ctx = $('#avgAgeChart');
      options = {
        scales: {
          xAxes: [{
            ticks: {
              suggestedMin: 15,
              suggestedMax: 65
            }
          }]
        }
      }
      var averageAgeChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: ageData,
        options: options
      });

      var avgExperience = parseFloat(data[0].avg_experience_years);
      $("#avgExperience").html("Kokemus vuosina: " + Math.round(avgExperience));
      var experienceData = {
        datasets: [{
          label: 'Kokemus vuosina',
          backgroundColor: 'rgba(243,138,165,0.75)',
          borderColor: 'rgba(0,0,0,1.0)',
          borderWidth: 1.0,
          data: [avgExperience],
        }]
      };
      ctx = $('#avgExperienceChart');
      options = {
        scales: {
          xAxes: [{
            ticks: {
              suggestedMin: 0,
              suggestedMax: 50
            }
          }]
        }
      }
      var averageExperienceChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: experienceData,
        options: options
      });

      var avgExpertise = [0, 0, 0, 0, 0, 0, 0];
      avgExpertise[0] = parseFloat(data[0].avg_programming);
      avgExpertise[1] = parseFloat(data[0].avg_web_frontend);
      avgExpertise[2] = parseFloat(data[0].avg_web_backend);
      avgExpertise[3] = parseFloat(data[0].avg_mobile_native);
      avgExpertise[4] = parseFloat(data[0].avg_mobile_hybrid);
      avgExpertise[5] = parseFloat(data[0].avg_relational_database);
      avgExpertise[6] = parseFloat(data[0].avg_nosql_database);
      var expertiseData = {
        datasets: [
					{
            label: 'Ohjelmointi yleisellä tasolla',
            backgroundColor: 'rgba(63,191,191,0.75)',
            data: [avgExpertise[0]],
						borderColor: 'rgba(0,0,0,1.0)',
	          borderWidth: 1.0
          },
          {
            label: "Web FrontEnd",
            backgroundColor: 'rgba(243,138,165,0.75)',
            data: [avgExpertise[1]],
						borderColor: 'rgba(0,0,0,1.0)',
	          borderWidth: 1.0,
          },
					{
            label: "Web BackEnd",
            backgroundColor: 'rgba(144,238,133,0.75)',
            data: [avgExpertise[2]],
						borderColor: 'rgba(0,0,0,1.0)',
	          borderWidth: 1.0,
          },
					{
            label: "Natiivi mobiili",
            backgroundColor: 'rgba(208,158,244,0.75)',
            data: [avgExpertise[3]],
						borderColor: 'rgba(0,0,0,1.0)',
	          borderWidth: 1.0,
          },
					{
            label: "Hybridi mobiili",
            backgroundColor: 'rgba(244,251,172,0.75)',
            data: [avgExpertise[4]],
						borderColor: 'rgba(0,0,0,1.0)',
	          borderWidth: 1.0,
          },
					{
            label: "Relaatiotietokannat",
            backgroundColor: 'rgba(247,208,134,0.75)',
            data: [avgExpertise[5]],
						borderColor: 'rgba(0,0,0,1.0)',
	          borderWidth: 1.0,
          },
					{
            label: "NoSQL-Tietokannat",
            backgroundColor: 'rgba(62,40,255,0.75)',
            data: [avgExpertise[6]],
						borderColor: 'rgba(0,0,0,1.0)',
	          borderWidth: 1.0,
          }]
      };
      ctx = $("#avgExpertiseChart");
      options = {
        scales: {
          xAxes: [{
            ticks: {
              suggestedMin: 1.0,
              suggestedMax: 5.0
            }
          }]
        }
      }
      var avgExpertiseChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: expertiseData,
        options: options
      });



    },
    error: function(data) {
      console.log(data);
    }
  });
});
