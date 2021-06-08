function sortLtH() {
    var contacts = $('.list-prod-parent'),
        cont = contacts.children('.prod-normal');
    cont.detach().sort(function (a, b) {
        var astts = $(a).children().data('sort');
        var bstts = $(b).children().data('sort')
        //return astts - bstts;
        return (astts > bstts) ? (astts > bstts) ? 1 : 0 : -1;
    });

    contacts.append(cont);
}

function sortHtL() {
    var contacts = $('.list-prod-parent'),
        cont = contacts.children('.prod-normal');

    cont.detach().sort(function (a, b) {
        var astts = $(a).children().data('sort');
        var bstts = $(b).children().data('sort')
        //return astts - bstts;
        return (astts < bstts) ? (astts < bstts) ? 1 : 0 : -1;
    });

    contacts.append(cont);
}
// a-z
function sortUnorderedList(ul, sortDescending) {
    if (typeof ul == "string")
        ul = document.getElementsByClassName(ul);

    // Idiot-proof, remove if you want
    if (!ul) {
        alert("The UL object is null!");
        return;
    }

    // Get the list items and setup an array for sorting
    var lis = document.getElementsByClassName("getName");
    console.log(lis);
    var vals = [];

    // Populate the array
    for (var i = 0, l = lis.length; i < l; i++)
        vals.push(lis[i].innerHTML);

    // Sort it
    vals.sort();

    // Sometimes you gotta DESC
    if (sortDescending)
        vals.reverse();

    // Change the list on the page
    for (var i = 0, l = lis.length; i < l; i++)
        lis[i].innerHTML = vals[i];
}


function filterColors(params) {
    if ($(".element-items").data('color') == params) {
        console.log('ok');
    }
}
window.onload = function () {

    var desc = false;
    document.getElementById("sortZtA").onclick = function () {
        $(".list-prod-parent").html(list_nor);
        sortUnorderedList("list-prod-parent", !desc);
        return false;
    }

    document.getElementById("sortAtZ").onclick = function () {
        $(".list-prod-parent").html(list_nor);
        sortUnorderedList("list-prod-parent", desc);
        return false;
    }


    var list_nor = $(".list-prod-parent").html();
    document.getElementById("sortNtO").onclick = function () {
        $(".list-prod-parent").html(list_nor);
    }

    var liss = document.getElementsByClassName("prod-normal");
    const list_item = [];
    for (var i = 0,  l = liss.length; i < l; i++) {
        list_item.push(liss[i].innerHTML);
    }
    list_item.reverse();
    document.getElementById("sortOtN").onclick = function () {
        for (var i = 0, l = liss.length; i < l; i++)
            liss[i].innerHTML = list_item[i];
    }

    var bsList = document.getElementsByClassName("prod-est");
    const list_itembs = [];
    for (var i = 0, l = bsList.length; i < l; i++)
        list_itembs.push(bsList[i].innerHTML);
    document.getElementById("sortBs").onclick = function () {
        for (var i = 0, l = bsList.length; i < l; i++) {
            liss[i].innerHTML = list_itembs[i];
        }
    }
}
