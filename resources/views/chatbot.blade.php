<!DOCTYPE html>
<html>
<head>
    <title>OpenAI Chatbot</title>
</head>
<body>
    <h1>Welcome to the OpenAI Chatbot</h1>
    <form method="post" action="{{ url('/chatbot') }}">
        <label for="message">Enter your message:</label><br>
        <input type="text" id="message" name="message"><br>
        <button type="submit">Send</button>
    </form>
    @if(isset($response))
        <p><strong>Response:</strong> {{ $response }}</p>
    @endif
</body>
</html>
