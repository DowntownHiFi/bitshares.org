<?php $section_title = "Security"; include '../header.php'; ?>
<section data-type="background" class="bitsharesx-header">
  <section class="inner-lg-billboard">
      <div class="container">
        <div class="row" style="min-height:80px">
        </div>
        <div class="row">
          <center>
            <h2 style="color:white; font-size:6em">Delegated Proof of Stake</h2>
          </center>
        </div>
      </div>
  </section>
</section>

<div id="white" class="bitsharesx">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
    <center><h1>Delegated Proof-of-Stake (DPOS)</h1></center>
    <center><h3>by Daniel Larimer</h3></center>
    <center><h4>April 3, 2014</h4></center>
    <br/>
    <br/>
    </div>
       </div>
    <div class="row">
       <div class="col-lg-2"> </div>
       <div class="col-lg-8">
         <center><h4>Abstract</h4></center>
         <p>
         This paper introduces a new implementation of proof of stake that can validate transactions 
         in seconds while providing greater security in a shorter period of time than all existing proof 
         of stake systems.  In the time it takes Bitcoin to produce a single block a DPOS system can 
         have your transaction verified by 20% of the shareholders and by the time Bitcoin claims the 
         transaction is almost irreversible (6 blocks, 1 hour) your transaction under DPOS has been 
         verified by 100% of the shareholders through their representatives.
         </p>
       </div>
    </div>
    <div class="row">
    <br/>
    <br/>
    </div>
    <div class="row">
    <h3> 1.0 Background </h3>
    <p>
    Distributed transaction ledgers need to be secure, unambiguous and irreversible in as short of time as possible to facilitate the most robust and decentralized systems.   In practice there are two different aspects to this process:  selecting a unique node to produce the block and making the ledger irreversible.
    </p>
    <h4> 1.1 Proof of Work </h4>
    <p>
    The first successful attempt at solving this problem was Bitcoin which used proof of work to make it computationally difficult to produce a longer ledger.  Proof of work behaves like a lottery where on average one node finds a block every 10 minutes.  If two nodes find a block at the same time then the network decides which block to build on top of based upon the decision of subsequent nodes.   From a statistical perspective, a transaction is considered unambiguously confirmed and irreversible after 6 blocks (about 1 hour); however, the core developers require 120 blocks (about 1 day) before they consider the network sufficiently protected from the potential of a longer attack-chain emerging that the newly generated coins may be spent.
    </p><p>
    Despite it being unlikely that a longer chain could emerge, any actor with significant economic resources could potentially build a longer chain or gain enough hashing power to freeze user accounts.
    </p>
    <h4>1.2 Proof of Stake</h4>
    <p>
    There have been many variations on proof of stake, but the basic concept is that the difficulty of producing a block should be proportional to your stake (percent ownership) in the network.   There have been two working systems deployed to date: Peercoin and Nxt.   Peercoin uses a hybrid model where your stake adjusts your mining difficulty and Nxt uses a deterministic algorithm to select a random shareholder to generate the next block.   Nxt’s algorithm adjusts the probability of being selected based upon your balance.
    </p><p>

    While Nxt and Peercoin have each solved the problem of who should generate the next block, they have not sufficiently solved the problem of making the block chain irreversibly secure in a timely manner.   Peer coin requires at least 6 blocks (1 hour) and Nxt requires 10 blocks according to the information we could find.   We could find no basis for the level of security provided by Nxt after 10 blocks.  
    </p><p>

    We previously published a paper on Transactions as Proof of Stake in which every transaction includes the hash of the previous block in the chain.  With this system the network becomes increasingly secure and irreversible by anyone as eventually every block is voted upon by every shareholder.  The challenge with Transaction as Proof of Stake (TaPOS) is that it defines no way to decide who should generate the next block.
    </p>

    <h4>1.3 Ripple Consensus </h4>
    <p>

    The Ripple consensus algorithm allows a group of nodes to agree to reach consensus based upon the concept of a unique node list.   The initial unique node list is like a club where 51% of the club members must vote to include a new member.   Consensus will follow this core 51% and those outside have no influence.  Because this club starts out “centralized” it will remain “centralized” and if it ever becomes corrupted there is nothing the shareholders can do.  Like Bitcoin and Peercoin, Ripple separates shareholders from voting rights and is thus much more centralized than other systems.

    </p>

    <h3>2.0 Delegated Proof of Stake</h3>

    <p>
    Adopting the metaphor of a Decentralized Autonomous Company (DAC), decentralization means that each shareholder holds influence proportional to her stake and that a vote of 51% of the shareholders is irreversible and binding.   The challenge is reaching the 51% approval threshold in a timely and efficient manner.
    </p><p>

    To achieve this goal, every shareholder may delegate their voting power to a representative.    The top 100 representatives by total votes take turns generating blocks on a defined schedule.  Each representative is allocated a time slot to produce a block.  If they do not produce a block then their slot is skipped and the next representative in line produces a block.  All representatives receive pay equal to 10% of the transactions fees included in the average block. If the average block contains fees of 100 shares, a representative will receive pay of 1 share.  
    </p><p>

    It is possible that network latency could cause some representatives to fail to propagate their block in a timely manner and this would result in a chain fork.   However, this is unlikely to occur because the representative can establish direct connections to the representative before and after them in the chain.   The establishment of this direct connection to the representative that follows you (and perhaps the one that follows him) is to make sure you get paid.  
    </p><p>

    With this model new blocks can be produced every 30 seconds and under normal network conditions chain forks are highly unlikely or can be resolved in just a few minutes.
    </p>


    <h4>2.1 Becoming a Representative</h4>
    <p>
    To become a representative you must register your public key with the network and be assigned a 32 bit unique identifier.  This identifier can then be referenced in the header of every transaction.   
    </p>

    <h4>2.2 Delegating your Vote</h4>

    <p>
    Every wallet has a preferences window that allows the user to select one or more representatives and rank them.   Once set, every transaction a user makes will transfer votes from the input representatives to the output representatives.  Normally users would not create transactions explicitly for the purpose of voting as this would cost them a transaction fee, but in the event of an emergency some users may feel it worth while to change their votes on a more pro-active manner by paying a fee.
    </p>

    <h4>2.3 Keeping Representatives Honest</h4>

    <p>
    Every wallet will display a status indicator that lets the user know how their representative is performing.  If they miss too many blocks then it will be recommended to the user that they switch to a new representative.   If any representative is found to have signed an invalid block then all standard wallets will require a new representative to be selected prior to making any further transactions from that wallet.
    </p>

    <h4>2.4 Resolving Chain Forks</h4>

    <p>
    Like proof of work and other proof of stake systems, the best block chain is the longest valid chain.  Anytime a representative misses their opportunity to sign a block that chain is one block shorter than potential competitors.   As long as 51% of the 100 blocks scheduled after your transaction is posted are produced you can safely assume that you are on the majority fork.  
    </p>

    <p>
    Perhaps the most important thing to prevent losses as a result of chain forks is to know when they are happening in the first place.  Because representatives are paid very well for producing blocks and thus maintain near 100% uptime to prevent being voted out of office and losing their income, you can safely assume that if more than 1 or 2 blocks are missed in the past 10 that some part of the internet may be experiencing connectivity issues and users should be extra vigilant and require extra confirmations.   If more than 5 of the last 10 blocks were missed then it means you are probably on a minority fork and should stop all trading until the fork can be resolved.
    </p>

    <p>
    The ability to easily detect and warn users of network splits in a timely manner (less than 5 minutes) is of critical importance to minimizing the potential of losses.   Even more important is knowing whether you are likely on a minority fork.
    </p>

    <h4>2.5 Are 100 Representatives Decentralized?</h4>
    <p>

    The definition of decentralized is hard to pin down because it has become a buzzword.  We consider the free market to be the ultimate form of decentralization and barriers to entry to be the basis of all centralization.  Like many things, there are degrees of centralization so we will instead compare the relative centralization of Delegated Proof of Stake to the other alternatives.
    </p>

    <h5>2.5.1  Bitcoin</h5>

    <p>
    Bitcoin currently operates on the basis of Delegated Proof of Work (DPOW) and therefore has about 10 representatives that control the vast majority of the hashing power.  Hashing power is itself centralized in the hands of those who can employee economies of scale to make mining unprofitable for their competition.  Lastly, proof of work creates a barrier to entry that prevents incumbents from being easily displaced.   Compared to Bitcoin, DPOS is at least 10x more decentralized in block production and perhaps infinitely more decentralized relative to market competition.
    </p>

    <p>
    Despite a limited amount of decentralization in hashing power, when it comes to percentage of shareholders (bitcoin holders) who are in control of Bitcoin we estimate it is clearly the most centralized.   If you consider the population of everyone who uses Bitcoin probably less than a fraction of a percent currently participate in mining.
    </p>

    <h5>2.5.2 Peercoin</h5>
    <p>

    Peercoin is a hybrid coin and is thus partial centralized by the proof of work.  Like Bitcoin it also has mining pools.   Compared to Bitcoin the Peercoin is certainly more decentralized; however, because proof of stake mining requires users to keep their computers on and wallets unlocked, only a small percentage of the shareholders participate in any kind of mining.
    </p>

    <h5>2.5.3 Nxt</h5>
    <p>
    Nxt uses transparent forging where the next node is deterministically selected.  It can be compared to using Delegated Proof of Stake where the only person you can delegate to is yourself and the frequency in which you have the opportunity to forge a block is directly related to your balance.  In this sense Nxt is more decentralized than Peercoin and Bitcoin, but still suffers poor user participation due to security risks and the fact that most regular users do not leave their computers on all day to take advantage of the opportunity.
    </p>
    <p>
    From this perspective we can conclude that the Nxt network is being secured by a small minority of the shareholders.   In effect, if you don’t show up to vote you lose your vote.    To resolve this issue some Nxt users pool their funds and trust a 3rd party to mine for them.   This increases shareholder participation by being a form of Delegated Proof of Stake, but also risks their balance while they are participating in the pool.
    </p>
    <h3>3.0 Attacks</h3>

      <p>
    There are generally two kinds of attacks that the network must defend against: denial of service and double spending.   An attacker performs a denial of service by preventing some or all transactions from being included in the ledger and can be performed by anyone with 51% of the network (whether Bitcoin, Nxt, or others).   A double spend attack is performed by gaining a short term advantage while the network is still attempting to reach consensus.   
    </p><p>

    To defend against these attacks the network must get 51% shareholder agreement as quickly as possible.   
    </p>

    <h4>3.1 Preventing Exclusion of Transactions</h4>

    <p>
    Having 100 representatives each elected by the shareholders and being required to take turns means that any transaction that is approved of by even 1% of the shareholders can be included in less than 30 minutes.   This means that no representative can benefit by excluding transactions that vote for other representatives. 
    </p>

    <h4>3.2 Centralizing power in a few Representatives </h4>
    <p>
    Because each representative has an equal vote and the top 100 are given equal weight regardless of votes delegated to them there is no ability to concentrate power by acquiring more than 1% of the vote in a single representative.   
    </p>
    <p>
    It may be possible for a single individual or organization to control multiple representatives in the chain, but this process would involve deceiving a large percentage of the shareholders into supporting sock-puppets.  
    </p>
    <p>
    Even if 51 sock-puppets could be set up their power to disrupt the network would still be limited, quickly identified, and then remedied.  Without the barriers to entry caused by proof of work, the honest majority would identify the attack and issue a fork of the code that ignored blocks produced by the attacker.  It would be disruptive, but not fatal.
    </p>

    <h4>3.3 DDOS of Representatives </h4>
    <p>
    Because there are only 100 representatives it is conceivable that an attacker could perform a round-robin denial of service attack against each representative when it was their turn to produce a block.   Fortunately this particular attack is easily mitigated by the fact that the representative is known by their public key and not their IP.  This will make identifying the target for a DDOS more difficult.  With the potential for direct connections between representatives it will be more difficult to interfere with the propagation of their blocks.
    </p>

    <h4>4.0 Transactions as Proof of Stake (TaPOS)</h4>
    <p>
   While representatives are an efficient manner of reaching strong consensus in a short period of time, TaPOS provides a means for the shareholders to directly confirm the behavior of their representatives over time.   On average 51% of the shareholders will directly confirm every block in less than 6 months.  Depending upon the percentage of shares in active circulation, as much as 10% of the shareholders may directly confirm the chain in just a few days.   This direct confirmation keeps the network secure in the long term and makes all attempted attacks extremely transparent. 
   </p>


   <h3>5.0 High Quality of Service </h3>
    <p> 
   Assuming a DPOS system had a $10 billion market cap and the average annual transaction fees were 0.25% and representatives combined earned 10% of all transaction fees, then each representative would be earning $25,000 per year just to keep their node on the network.  
   </p>
    <p>
   This is a very profitable role and one which many people will be constantly competing to acquire.  This means that everyone who wants a job will be actively looking for ways to steal support from those with the job.  They would do this through performing statistical analysis of the behavior of representatives to find any deviation from the standard algorithms.   Once a bias is found they can hopefully win some votes.    
   </p>
   <p>
   Those with the job will likely bend over backwards to prove they are running the standard software and the more effective they are at proving their integrity at block production the more likely they will be able to keep the job.   One can imagine the developers will quickly produce systems whereby the representatives can rapidly certify which transactions are widely distributed.   
   </p>
   <p>
   In effect the market competition will result in the most creative possible solutions of ensuring the integrity and reliability of the representatives.   There is much to gain by working to make the network more secure, but little to gain by attempting to disrupt the network.   
   </p>

   <h3>6.0 Conclusions</h3>
    <p>
   The process behind DPOS when combined with TaPOS produces a network that has more provable consensus behind it than Bitcoin, Peercoin, and Nxt by a factor of 3 or more.   DPOS is able to reach this consensus faster while eliminating the opportunity for small scale disruptions by random minority shareholders.  The economic incentives insure that the representatives will work to prove their good behavior and will likely adopt a consensus algorithm similar to Ripple.   DPOS is, in effect, a means to produce a unique node list for Ripple in a decentralized manner without having to worry about network splits.  
    </p>
    </div>
  </div>
</div>
<?php include '../footer.php'; ?>
