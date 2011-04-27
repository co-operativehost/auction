
     
                
                <script type="text/javascript" language="javascript" src="js/jquery-1.5.2.min.js"></script>
                <script type="text/javascript" language="javascript" src="js/jquery.tmpl.min.js"></script>
               
                
                <script type="text/javascript" language="javascript">
                        $(document).ready(function(){
                        
                                $('#auctionItemTemplate').tmpl(data).appendTo('#AuctionList');
                        
                                //First, we retrieve all the auction time divs and read their time values.
                                //The auctions array will contain all the auctions (or rather, the auction 
                                //end time and the div which should be updated with remaining seconds.
                                var auctions = $([]);
                                $('.Countdown').each(function(){
                                        var $this = $(this);
                                        var auction = {
                                                auctionEndTime: Date.parse($this.text()),
                                                timeDiv: $this
                                        };
                                        auctions.push(auction);
                                });
                                
                                var secondMultiplier = 1000;
                                var minuteMultiplier = secondMultiplier * 60;
                                var hourMultiplier = minuteMultiplier * 60;
                                //This method formats the date
                                var formatTime = function(date){
                                        var hours = Math.floor(date / hourMultiplier);
                                        var remaining = date - hours * hourMultiplier;
                                        var minutes = Math.floor(remaining / minuteMultiplier);
                                        remaining = remaining - minutes * minuteMultiplier;
                                        var seconds = Math.floor(remaining / secondMultiplier);
                                        if (minutes < 10)
                                                minutes = "0" + minutes;
                                        if (seconds < 10)
                                                seconds = "0" + seconds;
                                        return hours + ":" + minutes + ":" + seconds;
                                };
                                
                                //The updateAuctionTimes method updates the time fields with the number of seconds left
                                //until the auctions closes.
                               var millisecondsRemainingWhenTurningRed = 1000 * 11; //1000 to get one second, 11 to get 11 seconds 
                                                                                     //(we will turn red when it is less than 11 seconds left).
                                //The updateAuctionTimes method updates the time fields with the number of seconds left
                                //until the auctions closes.
                                var updateAuctionTimes = function(){
                                        var now = new Date();
                                        auctions.each(function(){
                                                var millisecondsToFinishedAuction = this.auctionEndTime - now;
                                                if (millisecondsToFinishedAuction <= millisecondsRemainingWhenTurningRed)
                                                        this.timeDiv.css('color','red');
                                                if (millisecondsToFinishedAuction <= 0)
                                                        this.timeDiv.text("Auction closed");
                                                else
                                                        this.timeDiv.text(formatTime(millisecondsToFinishedAuction) + " seconds remaining");
                                        });
                                };
                                
                                //The updateEverySecond method executes the updateAuctionTimes method and then sets a timeout
                                //to call the updateEverySecond method again after one second.
                                var millisecondsBetweenUpdates = 1000;
                                var updateEverySecond = function(){
                                        updateAuctionTimes();
                                        
                                        setTimeout(function(){
                                                updateEverySecond();
                                        }, millisecondsBetweenUpdates);
                                };
                                
                                //Starts the execution.
                                updateEverySecond();
                        });
                </script>
        
        
                <div id="AuctionList">
                </div>
       