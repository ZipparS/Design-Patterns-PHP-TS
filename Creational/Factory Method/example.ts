/*
Consider the case of a hiring manager. It is impossible for one person to interview for each of the positions. 
Based on the job opening, she has to decide and delegate the interview steps to different people.

In plain words:

It provides a way to delegate the instantiation logic to child classes.
*/

/////////////////////////////////////////////////////////////////////
// Taking our hiring manager example above. First of all we have 
// an interviewer interface and some implementations for it
/////////////////////////////////////////////////////////////////////
interface Interviewer {
    /**public*/askQuestions(): string;
}

class Developer implements Interviewer {
    public askQuestions(): string {
        return 'Asking about design patterns!';
    }
}

class CommunityExecutive implements Interviewer {
    public askQuestions(): string {
        return 'Asking about community building';
    }
}

/////////////////////////////////////////////////////////////////////
// Now let us create our HiringManager
/////////////////////////////////////////////////////////////////////
abstract class HiringManager {

    // Factory method
    protected abstract makeInterviewer(): Interviewer;

    public takeInterview() {
        const interviewer = this.makeInterviewer();
        return interviewer.askQuestions();
    }
}

/////////////////////////////////////////////////////////////////////
// Now any child can extend it and provide the required interviewer
/////////////////////////////////////////////////////////////////////
class DevelopmentManager extends HiringManager {
    protected makeInterviewer(): Interviewer {
        return new Developer();
    }
}

class MarketingManager extends HiringManager {
    protected makeInterviewer(): Interviewer {
        return new CommunityExecutive();
    }
}

/////////////////////////////////////////////////////////////////////
// and then it can be used as
/////////////////////////////////////////////////////////////////////
const devManager = new DevelopmentManager();
console.log(devManager.takeInterview()); // Output: Asking about design patterns

const marketingManager = new MarketingManager();
console.log(marketingManager.takeInterview()); // Output: Asking about community building.