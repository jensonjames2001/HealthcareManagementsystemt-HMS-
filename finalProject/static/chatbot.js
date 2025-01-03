"use strict";

// Show the chatbot popup when the Live Chat button is clicked
document.getElementById('liveChatBtn').addEventListener('click', function() {
    const chatbotPopup = document.getElementById('chatbot-popup');
    // Toggle visibility of the chatbot
    chatbotPopup.chatbot.display = chatbotPopup.chatbot.display === 'none' ? 'block' : 'none';
});

// Close the chatbot when the close button is clicked
document.getElementById('close-btn').addEventListener('click', function() {
    const chatbotPopup = document.getElementById('chatbot-popup');
    chatbotPopup.chatbot.display = 'none';
});

// Send message to the chatbot
function sendMessage() {
    const userInput = document.getElementById('user-input').value.trim();
    if (userInput !== '') {
        appendMessage('user', userInput); // Display user's message
        getAnswerFromBot(userInput); // Get chatbot's response
        document.getElementById('user-input').value = ''; // Clear input field
    }
}

// Get the answer from the chatbot based on predefined responses
function getAnswerFromBot(userInput) {
    const responses = {
        "hello|hi": "Hi there! How can I assist you today?",
        "how are you": "I'm just a bot, but I'm doing great! How about you?",
        "what is your name": "I'm your friendly chatbot. You can call me Bot!",
        "bye": "Goodbye! Have a great day!",
        "symptom|disease|fever|cough|headache|pain|COVID-19|stomach|flu|cold|infection|rash|injury|health": "Please visit our website or https://www.nhs.uk/ to find the answer",
        "appointment": "You can book an appointment through our 'Book an Appointment' page.",
        "contact": "You can contact customer support by visiting the 'Contact Us' page.",
        "log in": "You can log in by clicking the login button.",
        "register": "You can register by visiting our registration page.",
        "prescription": "You can request a prescription refill on the 'Repeat a Prescription' form.",
        "health issue": "Please visit the 'Report a Health Issue' form on our website.",
        "emergency": "In case of an emergency, please call your local emergency number.",
        "default": "Sorry, I didn't understand that. Can you ask something else?"
    };

    let response = responses["default"]; // Default response

    for (const key in responses) {
        const regex = new RegExp(key, 'i'); // Create regular expression with case-insensitive flag
        if (regex.test(userInput)) { // Check if input matches any pattern
            response = responses[key];
            break;
        }
    }

    appendMessage('bot', response); // Display chatbot's response
}

// Append a message to the chat box
function appendMessage(sender, message) {
    const chatBox = document.getElementById('chat-box');
    const messageElement = document.createElement('div');
    messageElement.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
    messageElement.innerHTML = message;
    chatBox.appendChild(messageElement);
    chatBox.scrollTop = chatBox.scrollHeight; // Scroll to the bottom
}

// Event listeners for buttons and input
document.getElementById('send-btn').addEventListener('click', sendMessage);
document.getElementById('user-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});
