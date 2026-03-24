function analyzeText() {
    let text = document.getElementById("textInput").value;

    if (text.trim() === "") {
        document.getElementById("result").innerHTML =
            "<p style='color:red;'>Please enter some text.</p>";
        return;
    }


    let charCount = text.length;

   
    let words = text.trim().split(/\s+/);
    let wordCount = words.length;

   
    let reversedText = "";
    for (let i = text.length - 1; i >= 0; i--) {
        reversedText += text[i];
    }

    
    document.getElementById("result").innerHTML = `
        <p><strong>Total Characters:</strong> ${charCount}</p>
        <p><strong>Total Words:</strong> ${wordCount}</p>
        <p><strong>Reversed Text:</strong><br>${reversedText}</p>
    `;
}