<?php
    include ('votesimulator.php');
?>
<h4 class="mb-2 mt-5 text-center"><strong>Results</strong></h4>
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header ">
                Psuedo-Random Result Generator
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped border-danger">
                    <thead>
                        <tr>
                            <th>Candidate</th>
                            <th>Votes</th>
                            <th>Shares</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($candidateVotes['pseudo'] as $candidate => $candidateData){ ?>
                        <tr>
                            <td><?php echo $candidate; ?></td>
                            <td><?php echo number_format($candidateData['votes'], 0); ?></td>
                            <td><?php echo $candidateData['share']; ?>%</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <h5 class="card-title">Explanation:</h5>
                <p class="card-text">
                    The results, even using different number of votes, generates similar results. This was processed by distributing votes using the mt_rand() function, which is a mathematical function from the PHP Programming Language.
                    Basically what it does is that it generates random numbers then the system decides where to cast the vote based on a set chance.
                    The problem with this is it most likely creates a pattern if you process big numbers on it which generates similar results which means the "random" number is not genuine.
                    <a href="https://citeseerx.ist.psu.edu/viewdoc/download?doi=10.1.1.85.2732&rep=rep1&type=pdf" target="_blank">More info about Mersenne Twister here</a>
                </p>
                <p>
                    I tried playing around with other functions like rand(), random_int(), and some custom coded functions, mixing and matching,
                    but still generates similar results. Other programming languages such as Python, Java, Ruby, etc has their own implementation of Mersenne Twister
                </p>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header ">
                Simple Shuffle Result Generator
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped border-primary">
                    <thead>
                    <tr>
                        <th>Candidate</th>
                        <th>Votes</th>
                        <th>Shares</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($candidateVotes['simple'] as $candidate => $candidateData){ ?>
                        <tr>
                            <td><?php echo $candidate; ?></td>
                            <td><?php echo number_format($candidateData['votes'], 0); ?></td>
                            <td><?php echo $candidateData['share']; ?>%</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <h5 class="card-title">Explanation</h5>
                <p class="card-text">
                    For this result, I just did a simple function which shuffles the votes for each candidate
                    which I think is the simplest way to generate an
                    unbiased sentiment result
                </p>
            </div>
        </div>
    </div>
</div>