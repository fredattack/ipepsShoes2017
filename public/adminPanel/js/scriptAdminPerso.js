/**
 * Created by fred on 14-10-17.
 */

function upDateReduction(idreduction,idModele){
    idreduction=idreduction['value'];
    $.ajax({
        url: 'upDateReduction',
        type: 'GET',
        data: {  id: idModele, reduction:idreduction },
        dataType:'html',
        success: function(response)
        {
            alert('Mise à jour de la promo');
            console.log('upDateReduction ok id:' + response );

        },
        error: function (xhr, b, c) {
            console.log("xhr=" + xhr + " b=" + b + " c=" + c);
        }
    });
}