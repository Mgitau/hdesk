
<html>
    <head>
        <style>
            
            .container{
                margin: 20px auto;
                background-color: #e7e7e7;
                padding: 10px;
            }
        </style>
    </head>
    
    <body>
                
                <p><b>Subject:</b> {{$ticket->subject}}</p> 


               <p><b>Message:</b> {{$ticket->message}}</p> 
                
               <p><b>Ticket ID:</b> {{$ticket->ticket_no}}</p> 
                
                
                <p><b>Category:</b> {{$ticket->category}}</p> 


               <p><b>Priority:</b> {{$ticket->priority}}</p> 
                
               <p><b>Created on:</b> {{$ticket->created_at}}</p> 
                

           
            </div>
                
    
    </body>
</html>    
            
