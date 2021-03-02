let filtre = $("#filtre button");
console.log($(filtre));

$(filtre).each(() => {
    $(this).on('click', () => {
        console.log($(this));
    });
});
