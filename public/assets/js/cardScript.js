document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('#btn-one').addEventListener('click', function () {
		html2canvas(document.querySelector('#main')).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			console.log(base64image);
			let pdf = new jsPDF('p', 'px', [1600, 1100]);
			pdf.addImage(base64image, 'PNG', 15, 15, 945, 785);
			pdf.save('webtylepress-two.pdf');
		});
	});

});