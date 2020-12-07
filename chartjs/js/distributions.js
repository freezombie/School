var age = [0,0,0];
var gender = [0,0,0];
var experience = [0,0,0,0];
var programming = [0,0,0,0,0];
var web_frontend = [0,0,0,0,0];
var web_backend = [0,0,0,0,0];
var mobile_native = [0,0,0,0,0];
var mobile_hybrid = [0,0,0,0,0];
var relational_database = [0,0,0,0,0];
var nosql_database = [0,0,0,0,0];

var ageData;
var genderData;
var experienceData;
var programmingData;
var web_frontendData;
var web_backendData;
var mobile_nativeData;
var mobile_hybridData;
var relational_databaseData;
var nosql_databaseData;

var agectx = $("#age");
var genderCTX = $("#gender");
var experienceCTX = $("#experienceDoughnut");
var programmingCTX = $("#programming");
var web_frontendCTX = $("#web_frontend");
var web_backendCTX = $("#web_backend");
var mobile_nativeCTX = $("#mobile_native");
var mobile_hybridCTX = $("#mobile_hybrid");
var relational_databaseCTX = $("#relational_database");
var nosql_databaseCTX = $("#nosql_database");

var barChartOptions =
{
	scales :
	{
		yAxes :
		[{
			ticks:
			{
				suggestedMin: 0,
				suggestedMax: 20
			}
		}]
	}
};

$(document).ready(function()
{

	$.ajax({
		url: "./distributions.php",
		method: "GET",
		success: function(data)
		{
			processAge(data);
			processGender(data);
			processExperience(data);
			processProgramming(data);
			processFrontEnd(data);
			processBackEnd(data);
			processNative(data);
			processHybrid(data);
			processRelational(data);
			processNoSQL(data);

			/*console.log(ageData);
			console.log(genderData);
			console.log(experienceData);
			console.log(programmingData);
			console.log(web_frontendData);*/
		},
		error: function(data)
		{
			console.log(data);
		}
	});

});


function processAge(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].age) <= 30)
		{
			age[0]++;
		}
		else if (parseInt(data[i].age) <= 51)
		{
			age[1]++;
		}
		else
		{
			age[2]++;
		}
	}
	ageData =
	{
		labels: ["15-30","31-50","51-65"],
		datasets : [{
				label: '# ohjelmoijista',

				backgroundColor: [
                'rgba(63,191,191,1.0)',
                'rgba(243,138,165,1.0)',
                'rgba(144,238,133,1.0)'
            ],
						borderColor: [
                'rgba(255,255,255,1.0)'
            ],
				borderWidth: 5.0,
				data: age,
			}]
	};
	var ageDoughnutChart = new Chart(agectx,
	{
		type: 'doughnut',
		data: ageData
	});
}

function processGender(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].gender) == 0)
		{
			gender[0]++;
		}
		else if (parseInt(data[i].gender) == 1)
		{
			gender[1]++;
		}
		else
		{
			gender[2]++;
		}
	}
	genderData =
	{
		labels: ["Mies","Nainen","Muu"],
		datasets : [{
				label: '# ohjelmoijista',

				backgroundColor: [
                'rgba(63,191,191,1.0)',
                'rgba(243,138,165,1.0)',
                'rgba(144,238,133,1.0)'
            ],
						borderColor: [
                'rgba(255,255,255,1.0)'
            ],
				borderWidth: 5.0,
				data: gender,
			}]
		};
	var genderPieChart = new Chart(genderCTX,
	{
		type: 'pie',
		data: genderData
	});
}

function processExperience(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].experience_years) <= 5)
		{
			experience[0]++;
		}
		else if (parseInt(data[i].experience_years) <= 10)
		{
			experience[1]++;
		}
		else if(parseInt(data[i].experience_years) <= 15)
		{
			experience[2]++;
		}
		else
		{
			experience[3]++;
		}
	}
	experienceData =
	{
		labels: ["0-5","6-10","11-15","Yli 15"],
		datasets : [{
				label: '# ohjelmoijista',

				backgroundColor: [
                'rgba(63,191,191,1.0)',
                'rgba(243,138,165,1.0)',
                'rgba(144,238,133,1.0)',
								'rgba(249,250,177,1.0)'
            ],
            borderColor: [
                'rgba(255,255,255,1.0)'
            ],
				borderWidth: 5.0,
				data: experience,
			}]
	};
	var experienceDoughnutChart = new Chart(experienceCTX,
	{
		type: 'doughnut',
		data: experienceData
	});
}

function processProgramming(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].programming) == 1)
		{
			programming[0]++;
		}
		else if (parseInt(data[i].programming) == 2)
		{
			programming[1]++;
		}
		else if(parseInt(data[i].programming) == 3)
		{
			programming[2]++;
		}
		else if(parseInt(data[i].programming) == 4)
		{
			programming[3]++;
		}
		else
		{
				programming[4]++;
		}
	}
	programmingData =
	{
		labels: ["1","2","3","4","5"],
		datasets : [{
				label: 'Ohjelmointi yleisellä tasolla',

				backgroundColor: 'rgba(144,238,133,0.75)',
        borderColor: 'rgba(255,255,255,0.1)',
				borderWidth: 1.0,
				data: programming,
			}]
	};
	var programmingBarChart = new Chart(programmingCTX,
	{
		type: 'bar',
		data: programmingData,
		options : barChartOptions
	});
}

function processFrontEnd(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].web_frontend) == 1)
		{
			web_frontend[0]++;
		}
		else if (parseInt(data[i].web_frontend) == 2)
		{
			web_frontend[1]++;
		}
		else if(parseInt(data[i].web_frontend) == 3)
		{
			web_frontend[2]++;
		}
		else if(parseInt(data[i].web_frontend) == 4)
		{
			web_frontend[3]++;
		}
		else
		{
				web_frontend[4]++;
		}
	}
	web_frontendData =
	{
		labels: ["1","2","3","4","5"],
		datasets : [{
				label: 'Web frontend',

				backgroundColor: 'rgba(243,138,165,0.75)',
        borderColor: 'rgba(255,255,255,0.1)',
				borderWidth: 1.0,
				data: web_frontend,
			}]
	};
	var web_frontendBarChart = new Chart(web_frontendCTX,
	{
		type: 'bar',
		data: web_frontendData,
		options : barChartOptions
	});
}

function processBackEnd(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].web_backend) == 1)
		{
			web_backend[0]++;
		}
		else if (parseInt(data[i].web_backend) == 2)
		{
			web_backend[1]++;
		}
		else if(parseInt(data[i].web_backend) == 3)
		{
			web_backend[2]++;
		}
		else if(parseInt(data[i].web_backend) == 4)
		{
			web_backend[3]++;
		}
		else
		{
				web_backend[4]++;
		}
	}
	web_backendData =
	{
		labels: ["1","2","3","4","5"],
		datasets : [{
				label: 'Web backend',

				backgroundColor: 'rgba(63,191,191,0.75)',
        borderColor: 'rgba(255,255,255,0.1)',
				borderWidth: 1.0,
				data: web_backend,
			}]
	};
	var web_backendBarChart = new Chart(web_backendCTX,
	{
		type: 'bar',
		data: web_backendData,
		options : barChartOptions
	});
}

function processNative(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].mobile_native) == 1)
		{
			mobile_native[0]++;
		}
		else if (parseInt(data[i].mobile_native) == 2)
		{
			mobile_native[1]++;
		}
		else if(parseInt(data[i].mobile_native) == 3)
		{
			mobile_native[2]++;
		}
		else if(parseInt(data[i].mobile_native) == 4)
		{
			mobile_native[3]++;
		}
		else
		{
				mobile_native[4]++;
		}
	}
	mobile_nativeData =
	{
		labels: ["1","2","3","4","5"],
		datasets : [{
				label: 'Mobile Native',

				backgroundColor: 'rgba(244,251,172,0.75)',
        borderColor: 'rgba(255,255,255,0.1)',
				borderWidth: 1.0,
				data: mobile_native,
			}]
	};
	var mobile_nativeBarChart = new Chart(mobile_nativeCTX,
	{
		type: 'bar',
		data: mobile_nativeData,
		options : barChartOptions
	});
}

function processHybrid(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].mobile_hybrid) == 1)
		{
			mobile_hybrid[0]++;
		}
		else if (parseInt(data[i].mobile_hybrid) == 2)
		{
			mobile_hybrid[1]++;
		}
		else if(parseInt(data[i].mobile_hybrid) == 3)
		{
			mobile_hybrid[2]++;
		}
		else if(parseInt(data[i].mobile_hybrid) == 4)
		{
			mobile_hybrid[3]++;
		}
		else
		{
				mobile_hybrid[4]++;
		}
	}
	mobile_hybridData =
	{
		labels: ["1","2","3","4","5"],
		datasets : [{
				label: 'Mobile Hybrid',

				backgroundColor: 'rgba(208,158,244,0.75)',
        borderColor: 'rgba(255,255,255,0.1)',
				borderWidth: 1.0,
				data: mobile_hybrid,
			}]
	};
	var mobile_hybridBarChart = new Chart(mobile_hybridCTX,
	{
		type: 'bar',
		data: mobile_hybridData,
		options : barChartOptions
	});
}

function processRelational(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].relational_database) == 1)
		{
			relational_database[0]++;
		}
		else if (parseInt(data[i].relational_database) == 2)
		{
			relational_database[1]++;
		}
		else if(parseInt(data[i].relational_database) == 3)
		{
			relational_database[2]++;
		}
		else if(parseInt(data[i].relational_database) == 4)
		{
			relational_database[3]++;
		}
		else
		{
				relational_database[4]++;
		}
	}
	relational_databaseData =
	{
		labels: ["1","2","3","4","5"],
		datasets : [{
				label: 'Relational Databases',

				backgroundColor: 'rgba(247,208,134,0.75)',
        borderColor: 'rgba(255,255,255,0.1)',
				borderWidth: 1.0,
				data: relational_database,
			}]
	};
	var relational_databaseBarChart = new Chart(relational_databaseCTX,
	{
		type: 'bar',
		data: relational_databaseData,
		options : barChartOptions
	});
}

function processNoSQL(data)
{
	for(var i in data)
	{
		if (parseInt(data[i].nosql_database) == 1)
		{
			nosql_database[0]++;
		}
		else if (parseInt(data[i].nosql_database) == 2)
		{
			nosql_database[1]++;
		}
		else if(parseInt(data[i].nosql_database) == 3)
		{
			nosql_database[2]++;
		}
		else if(parseInt(data[i].nosql_database) == 4)
		{
			nosql_database[3]++;
		}
		else
		{
				nosql_database[4]++;
		}
	}
	nosql_databaseData =
	{
		labels: ["1","2","3","4","5"],
		datasets : [{
				label: 'NoSQL Databases',

				backgroundColor: 'rgba(62,40,255,0.75)',
        borderColor: 'rgba(255,255,255,0.1)',
				borderWidth: 1.0,
				data: nosql_database,
			}]
	};
	var nosql_databaseBarChart = new Chart(nosql_databaseCTX,
	{
		type: 'bar',
		data: nosql_databaseData,
		options : barChartOptions
	});
}
