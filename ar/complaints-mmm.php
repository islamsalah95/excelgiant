<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إرسال الرسائل التلقائية</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            direction: rtl;
        }
        .button {
            margin: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .button:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .button:active {
            background-color: #1e7e34;
            transform: scale(0.98);
        }
        .file-input-label {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .file-input-label:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .file-input {
            display: none;
        }
        .upload-container {
            margin: 20px;
        }
        .list-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .list {
            margin: 0 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
        }
        .list h3 {
            margin-bottom: 10px;
        }
        .list ul {
            list-style: none;
            padding: 0;
        }
        .list ul li {
            margin: 5px 0;
        }
        .counter {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>برنامج الإرسال التلقائي لواتساب</h1>
    
    <div class="upload-container">
        <label for="fileNumbers" class="file-input-label">تحميل ملف الأرقام</label>
        <input type="file" id="fileNumbers" class="file-input" accept=".txt">
    </div>
    <div class="upload-container">
        <label for="fileMessage" class="file-input-label">تحميل ملف الرسالة</label>
        <input type="file" id="fileMessage" class="file-input" accept=".txt">
    </div>
    
    <textarea id="messageInput" rows="5" cols="50" placeholder="يمكنك كتابة الرسالة هنا..."></textarea>
    <br>
    <input type="number" id="startIndex" placeholder="أدخل رقم الصف لبدء الإرسال">
    <br>
    <button class="button" onclick="sendMessage()">إرسال رسالة</button>
    <button class="button" onclick="resetSentMessages()">إعادة الإرسال من البداية</button>

    <div class="list-container">
        <div class="list">
            <h3>الأرقام المتبقية (<span id="remainingCount">0</span>)</h3>
            <ul id="remainingNumbers"></ul>
        </div>
        <div class="list">
            <h3>الأرقام التي تم الإرسال لها (<span id="sentCount">0</span>)</h3>
            <ul id="sentNumbers"></ul>
        </div>
    </div>
    
    <p id="report" class="counter"></p>

    <script>
        let numbers = [];
        let sentMessages = 0;
        let sentNumbersList = [];
        let message = "";

        const randomWords = [
            "نتمنى لك التوفيق",
            "مع أطيب التحيات",
            "استمر في النجاح",
            "كل التوفيق في المستقبل",
            "نحن هنا لدعمك دائمًا",
            "شكراً لوقتك",
            "نتمنى لك يومًا سعيدًا"
        ];

        window.onload = () => {
            if (localStorage.getItem('numbers')) {
                numbers = JSON.parse(localStorage.getItem('numbers'));
            }

            if (localStorage.getItem('sentMessages')) {
                sentMessages = parseInt(localStorage.getItem('sentMessages'));
            }

            if (localStorage.getItem('sentNumbersList')) {
                sentNumbersList = JSON.parse(localStorage.getItem('sentNumbersList'));
            }

            if (localStorage.getItem('message')) {
                message = localStorage.getItem('message');
                document.getElementById('messageInput').value = message;
            }

            updateReport();
        };

        document.getElementById('fileNumbers').addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    numbers = e.target.result.split(/\r?\n/).filter(line => line.trim() !== '');
                    localStorage.setItem('numbers', JSON.stringify(numbers));
                    updateReport();
                };
                reader.readAsText(file);
            }
        });

        document.getElementById('fileMessage').addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    message = e.target.result.trim();
                    document.getElementById('messageInput').value = message;
                    localStorage.setItem('message', message);
                };
                reader.readAsText(file);
            }
        });

        function sendMessage() {
            let startIndexInput = document.getElementById('startIndex').value.trim();
            let startIndex = startIndexInput ? parseInt(startIndexInput) - 1 : 0;

            if (isNaN(startIndex) || startIndex < 0 || startIndex >= numbers.length) {
                startIndex = 0;
            }

            if (!message) {
                message = document.getElementById('messageInput').value.trim();
                localStorage.setItem('message', message);
            }

            if (numbers.length > 0) {
                const currentNumber = numbers[startIndex];
                const now = new Date();
                const formattedTime = `${now.toLocaleDateString('ar-EG')} ${now.toLocaleTimeString('ar-EG')}`;
                const randomWord = randomWords[Math.floor(Math.random() * randomWords.length)];
                const finalMessage = `${message}\n\n${randomWord}\nتم الإرسال بتاريخ: ${formattedTime}`;

                const url = `https://wa.me/${currentNumber}?text=${encodeURIComponent(finalMessage)}`;
                window.open(url, '_blank');

                sentNumbersList.push(currentNumber);
                numbers.splice(startIndex, 1);
                sentMessages++;

                localStorage.setItem('numbers', JSON.stringify(numbers));
                localStorage.setItem('sentNumbersList', JSON.stringify(sentNumbersList));
                localStorage.setItem('sentMessages', sentMessages);

                updateReport();
            } else {
                alert("تم إرسال الرسائل إلى جميع الأرقام.");
            }
        }

        function resetSentMessages() {
            sentNumbersList = [];
            sentMessages = 0;
            localStorage.removeItem('sentNumbersList');
            localStorage.removeItem('sentMessages');
            updateReport();
        }

        function updateReport() {
            document.getElementById('remainingNumbers').innerHTML = numbers.map(n => `<li>${n}</li>`).join('');
            document.getElementById('sentNumbers').innerHTML = sentNumbersList.map(n => `<li>${n}</li>`).join('');
            document.getElementById('remainingCount').innerText = numbers.length;
            document.getElementById('sentCount').innerText = sentMessages;
        }
    </script>
</body>
</html>
