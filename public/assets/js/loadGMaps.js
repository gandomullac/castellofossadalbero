// Funzione per creare e aggiungere l'iframe dinamicamente
function addIframe() {

    // Ottieni l'URL dall'attributo data-iframe-url
    var iframeUrl = document.currentScript.getAttribute('data-iframe-url');

    // Crea l'elemento iframe
    var iframe = document.createElement("iframe");
    iframe.style.border = "0";
    iframe.style.width = "100%";
    iframe.style.height = "350px";
    iframe.src = iframeUrl;
    iframe.frameborder = "0";
    iframe.allowfullscreen = true;

    // Ottieni il riferimento al container div
    var container = document.getElementById("iframeContainer");

    // Aggiungi l'iframe al container
    container.appendChild(iframe);
}

// Chiamata alla funzione quando la pagina è completamente caricata
window.onload = function() {
    addIframe();
};
