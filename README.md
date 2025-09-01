<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahbub Sufian - Full Stack Developer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            color: #f0f0f0;
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            text-align: center;
            padding: 60px 20px;
            position: relative;
            overflow: hidden;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
        }
        
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 10% 20%, rgba(255, 0, 150, 0.1) 0%, rgba(0, 100, 200, 0.1) 90%);
            z-index: 1;
        }
        
        h1 {
            font-size: 3.5rem;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4, #45b7d1);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: gradientMove 5s ease infinite;
        }
        
        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #a1c4fd;
        }
        
        h3 {
            font-size: 1.8rem;
            margin: 40px 0 20px;
            color: #4ecdc4;
            position: relative;
            display: inline-block;
        }
        
        h3::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            border-radius: 3px;
        }
        
        p {
            font-size: 1.1rem;
            margin-bottom: 15px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .typing-container {
            margin: 20px 0;
            min-height: 60px;
        }
        
        .typing-text {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ffd43b;
            display: inline-block;
        }
        
        .cursor {
            display: inline-block;
            width: 3px;
            height: 1.5rem;
            background-color: #ffd43b;
            margin-left: 4px;
            animation: blink 1s infinite;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .social-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .social-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .about-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: center;
            justify-content: center;
            margin: 40px 0;
        }
        
        .about-text {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .about-image {
            flex: 1;
            min-width: 300px;
            text-align: center;
        }
        
        .about-image img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: transform 0.5s ease;
        }
        
        .about-image img:hover {
            transform: scale(1.03);
        }
        
        .facts {
            margin: 30px 0;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            border-left: 4px solid #ff6b6b;
        }
        
        .tech-stack {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }
        
        .tech-category {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }
        
        .tech-category:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
        }
        
        .tech-category h4 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #ffa502;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        
        .badge {
            padding: 6px 12px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        
        .badge:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.08);
        }
        
        .stat-card h4 {
            font-size: 1.2rem;
            margin-bottom: 15px;
            color: #a1c4fd;
        }
        
        .stat-placeholder {
            height: 180px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-style: italic;
        }
        
        .trophies {
            margin: 40px 0;
            text-align: center;
        }
        
        .trophy-placeholder {
            height: 180px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-style: italic;
            margin: 20px 0;
        }
        
        footer {
            text-align: center;
            padding: 30px 0;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .view-counter {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            margin-top: 20px;
        }
        
        /* Animations */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .floating {
            animation: float 5s ease-in-out infinite;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            
            h2 {
                font-size: 1.5rem;
            }
            
            .about-container {
                flex-direction: column;
            }
            
            .tech-stack {
                grid-template-columns: 1fr;
            }
            
            .stats-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="animated-bg"></div>
            <div class="header-content">
                <h1>Mahbub Sufian</h1>
                <h2>Full Stack Developer from Bangladesh</h2>
                
                <div class="typing-container">
                    <span class="typing-text"></span>
                    <span class="cursor"></span>
                </div>
                
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/your-profile" class="social-btn">
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </a>
                    <a href="mailto:msufianbd92@gmail.com" class="social-btn">
                        <i class="fas fa-envelope"></i> Email
                    </a>
                    <a href="https://portfolio-website.com" class="social-btn">
                        <i class="fas fa-briefcase"></i> Portfolio
                    </a>
                </div>
            </div>
        </header>
        
        <section>
            <h3>🚀 About Me</h3>
            <div class="about-container">
                <div class="about-text">
                    <p>I'm a passionate Full Stack Developer with expertise in building web applications using modern technologies. I enjoy solving complex problems and creating efficient, scalable solutions with clean code.</p>
                    
                    <ul>
                        <li>🔭 I'm currently working on <strong>E-commerce platforms</strong></li>
                        <li>🌱 I'm currently learning <strong>PHP frameworks and advanced JavaScript</strong></li>
                        <li>👯 I'm looking to collaborate on <strong>open source projects</strong></li>
                        <li>💬 Ask me about <strong>Web Development, PHP, JavaScript</strong></li>
                    </ul>
                    
                    <div class="facts">
                        <p>⚡ Fun fact: <strong>I'm building a platform to help travelers find buddies because exploring the world alone is cool, but having someone to take your awkward tourist pics is even better.</strong></p>
                    </div>
                </div>
                
                <div class="about-image">
                    <img src="https://i.pinimg.com/originals/2e/cf/1e/2ecf1e5d9e8eabc1bebc0a195c5cba6b.gif" alt="Coding Animation" class="floating">
                </div>
            </div>
        </section>
        
        <section>
            <h3>🛠️ Tech Stack</h3>
            <div class="tech-stack">
                <div class="tech-category">
                    <h4><i class="fas fa-code"></i> Languages</h4>
                    <div class="badges">
                        <span class="badge"><i class="fab fa-php"></i> PHP</span>
                        <span class="badge"><i class="fab fa-js-square"></i> JavaScript</span>
                        <span class="badge"><i class="fab fa-html5"></i> HTML5</span>
                        <span class="badge"><i class="fab fa-css3-alt"></i> CSS3</span>
                    </div>
                </div>
                
                <div class="tech-category">
                    <h4><i class="fas fa-cubes"></i> Frameworks & Libraries</h4>
                    <div class="badges">
                        <span class="badge"><i class="fab fa-bootstrap"></i> Bootstrap</span>
                        <span class="badge"><i class="fas fa-code"></i> jQuery</span>
                    </div>
                </div>
                
                <div class="tech-category">
                    <h4><i class="fas fa-database"></i> Databases</h4>
                    <div class="badges">
                        <span class="badge"><i class="fas fa-database"></i> MySQL</span>
                    </div>
                </div>
                
                <div class="tech-category">
                    <h4><i class="fas fa-tools"></i> Tools</h4>
                    <div class="badges">
                        <span class="badge"><i class="fab fa-git-alt"></i> Git</span>
                        <span class="badge"><i class="fas fa-code"></i> VS Code</span>
                        <span class="badge"><i class="fas fa-code"></i> Postman</span>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
            <h3>📈 GitHub Stats</h3>
            <div class="stats-container">
                <div class="stat-card">
                    <h4>GitHub Statistics</h4>
                    <div class="stat-placeholder">
                        GitHub Stats Graph will appear here
                    </div>
                </div>
                
                <div class="stat-card">
                    <h4>Most Used Languages</h4>
                    <div class="stat-placeholder">
                        Language Stats Graph will appear here
                    </div>
                </div>
                
                <div class="stat-card">
                    <h4>Streak Stats</h4>
                    <div class="stat-placeholder">
                        Streak Stats Graph will appear here
                    </div>
                </div>
            </div>
        </section>
        
        <section class="trophies">
            <h3>🏆 GitHub Trophies</h3>
            <div class="trophy-placeholder">
                GitHub Trophies will appear here
            </div>
        </section>
        
        <footer>
            <p>© 2023 Mahbub Sufian. All rights reserved.</p>
            
            <div class="social-links">
                <a href="https://www.linkedin.com/in/your-profile" class="social-btn">
                    <i class="fab fa-linkedin"></i> Connect on LinkedIn
                </a>
                <a href="mailto:msufianbd92@gmail.com" class="social-btn">
                    <i class="fas fa-envelope"></i> Send me an Email
                </a>
            </div>
            
            <div class="view-counter">
                <i class="fas fa-eye"></i>
                <span>Profile Views: 1287</span>
            </div>
        </footer>
    </div>

    <script>
        // Typing animation
        document.addEventListener('DOMContentLoaded', function() {
            const texts = [
                "Full Stack Developer",
                "PHP | JavaScript Developer", 
                "Open Source Enthusiast",
                "Problem Solver"
            ];
            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            const typingSpeed = 100;
            const deleteSpeed = 50;
            const pauseTime = 2000;
            
            const typingText = document.querySelector('.typing-text');
            const cursor = document.querySelector('.cursor');
            
            function type() {
                const currentText = texts[textIndex];
                
                if (isDeleting) {
                    // Delete text
                    typingText.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    // Type text
                    typingText.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                }
                
                // Set timing for next action
                let typeDelay = isDeleting ? deleteSpeed : typingSpeed;
                
                if (!isDeleting && charIndex === currentText.length) {
                    // Pause at end of text
                    typeDelay = pauseTime;
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    // Move to next text
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                    typeDelay = 500;
                }
                
                setTimeout(type, typeDelay);
            }
            
            // Start typing animation
            setTimeout(type, 1000);
            
            // Animate stats cards on scroll
            const statCards = document.querySelectorAll('.stat-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            statCards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                observer.observe(card);
            });
        });
    </script>
</body>
</html>
