const remainingTime = document.querySelector('.auction-end-time');
let timerInterval;

const updateRemainingTime = () => {
    const endTime = new Date(remainingTime.dataset.endTime);
    const now = new Date();
    const timeDifference = endTime - now;

    if (timeDifference <= 0) {
        remainingTime.textContent = 'Auction ended';
        clearInterval(timerInterval);
        return;
    }

    const hours = Math.floor(timeDifference / (1000 * 60 * 60));
    const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);
    // console.log(`${hours}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`);
    if(hours === 0 && minutes === 0 && seconds === 0) {
        remainingTime.textContent = 'Auction ended';
        clearInterval(timerInterval);
        return;
    }
    else if(hours === 0 && minutes === 0) {
        remainingTime.textContent = `${seconds}s remaining`;
    }
    else if(hours === 0) {
        remainingTime.textContent = `${minutes}:${seconds.toString().padStart(2, '0')} remaining`;
    }
    else {
        remainingTime.textContent = `${hours}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')} remaining`;
    }
}

timerInterval = setInterval(updateRemainingTime, 1000);
