$(document).ready(function () {
	$(".showAssignUser").hide();
	$(".showAssignGroup").hide();
	$(".showCollective").hide();

	$("#privateNo").click(function () {
		$(".showCollective").show();
	});
	$("#privateYes").click(function() {
		$(".showCollective").hide();
		$(".showAssignGroup").hide();
		$(".showAssignUser").hide();
	})
	$("#collectiveYes").click(function() {
		$(".showAssignUser").hide();
		$('.showAssignGroup').show();
	});
	$("#collectiveNo").click(function() {
		$(".showAssignUser").show();
		$('.showAssignGroup').hide();
	});

});

// collective action

$(document).ready(function () {
	$('#dataTable2').DataTable();
	$('#dataTable3').DataTable();
	$('#dataTable4').DataTable();
	$('#dataTable5').DataTable();
	$('#dataTable6').DataTable();
	$('#dataTable7').DataTable();
});

$(document).ready(function () {
	new Chart(document.getElementById("pie-chart"), {
		type: 'pie',
		data: {
			labels: ["Open", "Completed"],
			datasets: [{
				backgroundColor: ["#c21e56", "green"],
				data: [40, 30]
			}]
		}
	});

	new Chart(document.getElementById("bar-chart"), {
		type: 'bar',
		data: {
			labels: ["Club", "Homework", "Workshop", "Sport"],
			datasets: [
				{
					default: 0,
					label: "Number of Tasks",
					backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9"],
					data: [10, 3, 8, 5]
				}
			]
		},
		options: {
			legend: { display: false }
		}
	});

	new Chart(document.getElementById("line-chart"), {
		type: 'line',
		data: {
			labels: ['Current Week', 'Next Week', 'Week +2', 'Week +3'],
			datasets: [{
				data: [0, 5, 3, 12],
				label: "Club Meeting",
				borderColor: "#3e95cd",
				fill: false
			}, {
				data: [0, 3, 8, 15],
				label: "Sports",
				borderColor: "#8e5ea2",
				fill: false
			}, {
				data: [0, 6, 5, 13],
				label: "Homework",
				borderColor: "#c45850",
				fill: false
			}
			]
		},
		options: {
			title: {
				display: true,
				text: 'Man Days',
				fontSize: 22
			}
		}
	})

});

$(function () {
	var date = new Date();
	date.setDate(date.getDate());

	flatpickr("#flatpickr_datetime", {
		enableTime: true,
		minDate: "today"
	});
	
	$('#check1[type="checkbox"]').click(function () {
		$('#alls').removeAttr('style');
		if ($(this).prop("checked") == true) {
            $('#alls').show();
            $('#opens').hide();
		}
	});
	$('#check1[type="checkbox"]').click(function () {
		$('#alls').removeAttr('style');
		if ($(this).prop("checked") == false) {
			$('#alls').hide();
            $('#opens').show();
		}
	});

	$('#check2[type="checkbox"]').click(function () {
		$('#allsC').removeAttr('style');
		if ($(this).prop("checked") == true) {
            $('#allsC').show();
            $('#opensC').hide();
		}
	});
	$('#check2[type="checkbox"]').click(function () {
		$('#allsC').removeAttr('style');
		if ($(this).prop("checked") == false) {
			$('#allsC').hide();
            $('#opensC').show();
		}
	});
});

function newFunction() {
	$('.dataTable10').DataTable();
	$('.dataTable11').DataTable();
}