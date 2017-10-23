/**
 * Created by fred on 14-10-17.
 */

function upDateReduction(idreduction,idModele) {
    idreduction = idreduction['value'];
    $.ajax({
        url: 'upDateReduction',
        type: 'GET',
        data: {id: idModele, reduction: idreduction},
        dataType: 'html',
        success: function (response) {
            alert('Mise à jour de la promo');
            console.log('upDateReduction ok id:' + response);
            location.reload();

        },
        error: function (xhr, b, c) {
            console.log("xhr=" + xhr + " b=" + b + " c=" + c);
        }
    });
}

function upDateRole(idRole,idUser){
    idRole=idRole['value'];
    $.ajax({
        url: 'upDateRole',
        type: 'GET',
        data: {  id: idUser, Role:idRole },
        dataType:'html',
        success: function(response)
        {
            alert('Mise à jour du role');
            console.log('upDateRole ok id:' + response );
            location.reload();

        },
        error: function (xhr, b, c) {
            console.log("xhr=" + xhr + " b=" + b + " c=" + c);
        }
        });
}