<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Modal</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General modal styling */
        .modal-dialog {
            max-width: 800px;
            max-height: 600px;
            margin: 1.75rem auto;
        }

        .modal-content {
            border-radius: 10px;
            overflow: hidden;
        }

        /* Tab styling */
        .nav-tabs .nav-link {
            color: #495057;
            font-weight: 500;
        }
        
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            border-bottom: 3px solid #0d6efd;
        }

        /* Message container styling */
        .message-container {
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .message-time {
            font-size: 12px;
            color: #888;
        }

        .message-subject {
            font-size: 14px;
            font-weight: bold;
            color: #333;
            margin: 5px 0;
        }

        .message-content {
            font-size: 13px;
            color: #555;
        }

        /* Scrollable content */
        .modal-body {
            overflow-y: auto;
            max-height: 450px;
        }
    </style>
</head>
<body>

<!-- Button to Open Modal -->
<div class="container text-center mt-5">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chatModal">
        View Messages
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatModalLabel">Chat Messages</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Tabs for callback and negotiation chat -->
                <ul class="nav nav-tabs" id="chatTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="callback-tab" data-bs-toggle="tab" data-bs-target="#callback" type="button" role="tab" aria-controls="callback" aria-selected="true">Callback Requests</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="negotiation-tab" data-bs-toggle="tab" data-bs-target="#negotiation" type="button" role="tab" aria-controls="negotiation" aria-selected="false">Negotiation Chats</button>
                    </li>
                </ul>

                <!-- Tab contents -->
                <div class="tab-content mt-3" id="chatTabContent">
                    <!-- Callback Requests Tab -->
                    <div class="tab-pane fade show active" id="callback" role="tabpanel" aria-labelledby="callback-tab">
                        <div class="message-container">
                            <div class="message-time">2024-10-28 14:00</div>
                            <div class="message-subject">Callback Request</div>
                            <div class="message-content">Please call me back regarding the recent updates on my application.</div>
                        </div>
                        <div class="message-container">
                            <div class="message-time">2024-10-27 11:30</div>
                            <div class="message-subject">Inquiry Follow-up</div>
                            <div class="message-content">Can you call back to discuss the additional requirements needed?</div>
                        </div>
                        <!-- Add more message containers as needed -->
                    </div>

                    <!-- Negotiation Chats Tab -->
                    <div class="tab-pane fade" id="negotiation" role="tabpanel" aria-labelledby="negotiation-tab">
                        <div class="message-container">
                            <div class="message-time">2024-10-28 09:15</div>
                            <div class="message-subject">Price Discussion</div>
                            <div class="message-content">I'm willing to negotiate on the price. Let me know your best offer.</div>
                        </div>
                        <div class="message-container">
                            <div class="message-time">2024-10-26 16:45</div>
                            <div class="message-subject">Extended Warranty</div>
                            <div class="message-content">Is there an option for an extended warranty for this product?</div>
                        </div>
                        <!-- Add more message containers as needed -->
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS for tabs functionality -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
