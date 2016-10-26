<?php
//clean the form data to prevent injections
    function validateFormData( $formData )
    {
        $formData = trim( stripslashes( htmlspecialchars( strip_tags( str_replace( array( '(', ')' ), '', $formData ) ), ENT_QUOTES ) ) );

        return $formData;
    }

    class Functions{
        public function fetch_events()
        {
            global $pdo;

            $query= $pdo->prepare("select id,name,description,location,time FROM events where status = 'pending' order by `id` DESC ");
            $query->execute();
            return $query ->fetchAll();
        }
        public function fetch_event_registrations()
        {
            global $pdo;

            $query= $pdo->prepare("select roll,event FROM event_register order by `id` DESC ");
            $query->execute();
            return $query ->fetchAll();
        }
        public function fetch_past_events()
        {
            global $pdo;

            $query= $pdo->prepare("select name,date,winners,runners FROM past_events order by `id` DESC ");
            $query->execute();
            return $query ->fetchAll();
        }
    }
?>