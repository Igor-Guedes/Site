const express = require('express');
const { Client } = require('whatsapp-web.js');
const app = express();

const client = new Client();
client.initialize();

app.post('/enviar-whatsapp', async (req, res) => {
    const { phone, caption, file } = req.body;
    
    try {
        const contato = await client.getNumberId(phone);
        await client.sendMessage(contato._serialized, {
            body: caption,
            media: file
        });
        
        res.status(200).json({ success: true });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

app.listen(3000, () => console.log('Servidor rodando na porta 3000'));