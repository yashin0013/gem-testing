document.addEventListener('DOMContentLoaded', function () {

    document.querySelector('#btn-one').addEventListener('click', function () {
		// let element = document.querySelector('#main');
		// html2pdf()
		// .from(element)
		// .save();

		const pdf = new jsPDF();

    // Get HTML content to be converted to PDF
    const content = document.getElementById('main');

    // Generate PDF from HTML
    pdf.html(content, {
        callback: function(pdf) {
            // Save PDF
            pdf.save('generated-pdf.pdf');
        }
    });

		// html2canvas(document.querySelector('#main')).then((canvas) => {
		// 	let base64image = canvas.toDataURL('image/png');
		// 	// console.log(base64image);
		// 	let pdf = new jsPDF('px', 'px', [930, 950]);
		// 	pdf.addImage(base64image, 'PNG', 15, 15, 945, 785);
		// 	pdf.save('card.pdf');
		// });
	});

});