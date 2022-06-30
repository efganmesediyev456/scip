<?php
/*
 * Copyright (c) 2022.
 *
 * SAFAROFF Agency. (https://safaroff.com) All Rights Reserved.
 *
 * Added by Samir Mammadhasanov (https://samirmhsnv.dev)
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace App\Traits;

use App\Models\SearchEngineField;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasSearchEngineField
{
    use HasUserAgent;

    public function seo(): MorphOne
    {
        return $this->morphOne(SearchEngineField::class, 'seoable');
    }
}
