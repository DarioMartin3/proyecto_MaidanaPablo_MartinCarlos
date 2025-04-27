<style>

.container {
    text-align: center;
    padding: 4rem;
    max-width: 90%;
    box-sizing: border-box;
}
.icon {
    font-size: 80px;
    color: black;
    animation: bounce 1.5s infinite;
}
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}
h1 {
    font-size: 2rem;
    margin: 20px 0;
}
p {
    font-size: 1rem;
    margin: 10px 0;
}
.progress-bar {
    margin: 20px auto;
    width: 80%;
    max-width: 300px;
    height: 10px;
    background: #ddd;
    border-radius: 5px;
    overflow: hidden;
    position: relative;
}
.progress-bar::before {
    content: '';
    position: absolute;
    width: 50%;
    height: 100%;
    background: black;
    animation: loading 2s infinite;
}
@keyframes loading {
    0% {
        left: -50%;
    }
    50% {
        left: 25%;
    }
    100% {
        left: 100%;
    }
}
/* Responsive Design */
@media (max-width: 768px) {
    .icon {
        font-size: 60px;
    }
    h1 {
        font-size: 1.8rem;
    }
    p {
        font-size: 0.9rem;
    }
}
@media (max-width: 480px) {
    .icon {
        font-size: 50px;
    }
    h1 {
        font-size: 1.5rem;
    }
    p {
        font-size: 0.8rem;
    }
}
</style>
<section class="container">
        <div class="icon">🚧</div>
        <h1>PÁGINA EN CONSTRUCCIÓN</h1>
        <p>Estamos trabajando para traerte algo increíble. ¡Vuelve pronto!</p>
        <div class="progress-bar"></div>
</section>

    