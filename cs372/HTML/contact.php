<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Coastal Concrete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../Images/Logo2.png" alt="Coastal Concrete Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container my-5">
        <h2 class="text-center mb-4">Contact Us</h2>
        <div class="row">

        <?php
        class Contact {
            protected string $name;
            protected string $role;
            protected string $phone;
            protected string $email;

            public function __construct(string $name, string $role, string $phone, string $email) {
                $this->name = $name;
                $this->role = $role;
                $this->phone = $phone;
                $this->email = $email;
            }

            public function display(): void {
                echo "<div class='col-md-6 mb-4'>
                        <div class='border rounded p-4 shadow'>
                            <h4>{$this->name}</h4>
                            <p><strong>Role:</strong> {$this->role}</p>
                            <p><strong>Phone:</strong> <a href='tel:{$this->phone}'>{$this->phone}</a></p>
                            <p><strong>Email:</strong> <a href='mailto:{$this->email}'>{$this->email}</a></p>
                        </div>
                      </div>";
            }
        }

        // Create and display contacts
        $contact1 = new Contact("Brendan Spiewak", "Site Manager", "401-569-1008", "brendan@coastalconcrete.com");
        $contact2 = new Contact("Michael Spiewak", "Project Manager", "401-569-1006", "michael@coastalconcrete.com");
        $contact3 = new Contact("Richard Spiewak", "Founder & Estimator", "401-255-2133", "richard@coastalconcrete.com");

        $contact1->display();
        $contact2->display();
        $contact3->display();

        ?>

            <div class="col-md-6">
                <h4>Send Us a Message</h4>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <section class="container my-5" id="map-container">
        <iframe src="https://www.google.com/maps/embed?..." width="100%" height="300" style="border:0;" allowfullscreen loading="lazy"></iframe>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
