const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server,{
    cors:{origin:"*"}
});
app.get('/',function(res,req){
    console.log(true);
    return true;
})

io.on('connection',(socket)=>{
    console.log('connection success:---',socket.id);
    socket.on('disconnect',(socket)=>{
        console.log('socket disconnected');
    })
    socket.on('message',(message)=>{
        console.log('message---',message);
        socket.emit('serverToClient','okay')
    })
})

server.listen(3000,()=>{
    console.log('Server is running');
});