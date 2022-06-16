 async function initializeCashApp(payments) {
    const paymentRequest = buildPaymentRequest(payments);
    const cashAppPay = await payments.cashAppPay(paymentRequest, {
      redirectURL: window.location.href,
      referenceId: 'my-website-00000001',
    });
    const buttonOptions = {
      shape: 'semiround',
      width: 'full',
    };
    await cashAppPay.attach('#cash-app-pay', buttonOptions);
    return cashAppPay;
  }

  async function createPayment(token) {
    const body = JSON.stringify({
      locationId,
      sourceId: token,
    });

    const paymentResponse = await fetch('/payment', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body,
    });

    if (paymentResponse.ok) {
      return paymentResponse.json();
    }

    const errorBody = await paymentResponse.text();
    throw new Error(errorBody);
  }

  // status is either SUCCESS or FAILURE;
  function displayPaymentResults(status) {
    const statusContainer = document.getElementById(
      'payment-status-container'
    );
    if (status === 'SUCCESS') {
      statusContainer.classList.remove('is-failure');
      statusContainer.classList.add('is-success');
    } else {
      statusContainer.classList.remove('is-success');
      statusContainer.classList.add('is-failure');
    }

    statusContainer.style.visibility = 'visible';
  }

  document.addEventListener('DOMContentLoaded', async function () {
    if (!window.Square) {
      throw new Error('Square.js failed to load properly');
    }

    let payments;
    try {
      payments = window.Square.payments(appId, locationId);
    } catch {
      const statusContainer = document.getElementById(
        'payment-status-container'
      );
      statusContainer.className = 'missing-credentials';
      statusContainer.style.visibility = 'hidden';
      return;
    }

    let cashAppPay;
    try {
      cashAppPay = await initializeCashApp(payments);
    } catch (e) {
      console.error('Initializing Cash App Pay failed', e);
    }
    if (cashAppPay) {
      cashAppPay.addEventListener(
        'ontokenization',
        async function ({ detail }) {
          const tokenResult = detail.tokenResult;
          if (tokenResult.status === 'OK') {
            const paymentResults = await createPayment(tokenResult.token);

            displayPaymentResults('SUCCESS');
            console.debug('Payment Success', paymentResults);
          } else {
            let errorMessage = `Tokenization failed with status: ${tokenResult.status}`;

            if (tokenResult.errors) {
              errorMessage += ` and errors: ${JSON.stringify(
                tokenResult.errors
              )}`;
            }
            displayPaymentResults('FAILURE');
            throw new Error(errorMessage);
        }
    }
  );
}
});