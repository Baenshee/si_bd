function initClickTd(click_elem)
{
    if (click_elem)
    {
        // Teste si la méthode addEventListener existe (Non IE)
        if (click_elem.addEventListener)
        {
            // Associe à l'événement click la fonction showWindow (Non IE)
            click_elem.addEventListener('click', triCol, false);
        }
        else
        {
            // Associe à l'événement onclick la fonction showWindow (IE)
            click_elem.attachEvent('onclick', triCol);
        }
    }

    click_elem.style.fontWeight = 'bold';
    click_elem.style.cursor = 'pointer';

} // initClickTd(click_elem)





//Variable implicite de type tableau contenant le type de tri
var type_tri = new Array();
/**
 * Méthode de tri pour les colonnes d'un tableau
 * @param int identifiant de la colonne
 *
 * @return none;
 */
function triCol(event)
{
    // Récupère l'élément <th> cliqué
    var target = event.target || event.srcElement;

    // Récupère l'élément <tr> de l'élément <thead>
    var tr_thead = target.parentNode;
    // Récupère les éléments <th>
    var th = tr_thead.getElementsByTagName('th');
    var nb_th = th.length;
    // Boucle sur les éléments <th>
    for (var i = 0; i < nb_th; ++i)
    {
        // Teste si l'index de l'élément <th> correspond à l'élément <th> cliqué
        if (th[i] == target)
        {
            // Récupère l'index de l'élément <th> cliqué
            col = i;
        }
    }

    // Récupère l'élément <tbody>
    var tbody = document.getElementsByTagName('tbody')[0];
    // Récupère les éléments <tr>
    var tr = tbody.getElementsByTagName('tr');
    // Récupère le nombre d'éléments <tr>
    var nb_tr = tr.length;
    // Initialise le tableau text
    var text = new Array();
    // Initialise le tableau de copie de lignes
    var tr_clone = new Array();

    for (var i = 0; i < nb_tr; ++i)
    {
        // Récupère les textes de la colonne cliquée
        // Teste si le conteu de l'élément <td> contient un élément <a>
        if (tr[i].getElementsByTagName('td')[col].getElementsByTagName('a')[0])
        {
            text[i] = tr[i].getElementsByTagName('td')[col].getElementsByTagName('a')[0].innerHTML;
        }
        else
        {
            text[i] = tr[i].getElementsByTagName('td')[col].innerHTML;
        }

        // Met les textes récupérés en majuscule
        text[i] = text[i].toUpperCase();

        // Récupère la copie de la ligne correspondant au texte
        tr_clone[i] = tr[i].cloneNode(true);
    }

    type_tri[col] = ('desc' == type_tri[col]) ? 'asc' : 'desc';

    // Tri des données
    triData(tr_clone, text, type_tri[col]);

    // Remplacement des lignes par les lignes triées
    for (var i = 0; i < nb_tr; ++i)
    {
        // Remplacement de la ligne par la ligne triée
        tbody.replaceChild(tr_clone[i], tr[i]);

        initClickTd(tr_clone[i].getElementsByTagName('td')[0]);
    }

} // triCol(event)

/**
 * Tri à bulles des textes et des lignes
 * @param array tr_clone tableau des lignes copiées
 * @param array text texte à trier
 * @param string tri type de tri (ascendant ou descendant)
 *
 * @return boolean
 */
function triData(tr_clone, text, tri)
{
    // Variable booléenne pour le test du tri
    var trier = true;
    // Variable temporaire pour les échanges de l'indice du tableau text lors du tri
    var tmp_text = null;
    // Variable temporaire pour les échanges de l'indice du tableau tr_clone lors du tri
    var tmp_tr = null;

    // Nombre de lignes à trier
    var nb_tr = text.length;
    for (i = 0; i < nb_tr && trier; ++i)
    {
        // Variable du test de tri mis à false (tri réussi)
        trier = false;
        for (var j = 1; j < nb_tr - i; ++j)
        {
            // test suivant le type de tri
            // test entre la variable text d'indice j et d'indice j-1 (c'est pour quoi on démarre la boucle à j = 1)
            if (('desc' == tri && text[j] < text[j-1]) ||
                ('asc' == tri && text[j] > text[j-1]))
            {
                // On instancie la variable temporaire avec le texte contenu dans la variable d'indice j-1
                tmp_text = text[j-1];
                // On instancie la variable d'indice j-1 avec le texte contenu dans la variable d'indice j
                text[j-1] = text[j];
                // On instancie la variable d'indice j  avec le texte contenu dans la variable temporaire
                text[j] = tmp_text;

                // On instancie la variable temporaire avec la ligne copiée contenue dans la variable d'indice j-1
                tmp_tr = tr_clone[j-1];
                // On instancie la variable d'indice j-1 avec la ligne copiée contenue dans la variable d'indice j
                tr_clone[j-1] = tr_clone[j];
                // On instancie la variable d'indice j  avec la ligne copiée contenue dans la variable temporaire
                tr_clone[j] = tmp_tr;

                // Variable du test de tri mis à true (tri échoué)
                trier = true;
            }
        }
    }

} // triData(tr_clone, text, tri)