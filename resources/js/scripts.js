$('a')
    .click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
    .on('shown.bs.tab', function (e) {
        $('#actif').text($(e.target).text())
        $('#precedent').text($(e.relatedTarget).text())
    })